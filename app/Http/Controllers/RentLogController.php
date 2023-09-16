<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BookRent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentLogController extends Controller
{
    public function clientRentLog() {
        return view('Client.rentLog',["rent_logs" => BookRent::where('user_id', Auth::user()->id)->where('status','Finished')->orderBy('id', 'desc')->paginate(5)->withQueryString()]);
    }

    public function adminRentLog() {
        $rentLogs = BookRent::with(['user','book'])->filter(request(['search','category']))
                        ->where(function($query) {
                            $query->where('status', 'Approved')
                                ->orWhere('status', 'Finished');
                        })->orderBy('id','desc')->paginate(10)->withQueryString();

        $totalFine = 0;
        $daysLate = 0;
        $daysLateArray = [];

        foreach ($rentLogs as $rent) {
            if ($rent->actual_return_date != null) {
                $fineAmount = $this->calculateFine(Carbon::parse($rent->return_date),Carbon::parse($rent->actual_return_date));
                $daysLate = $this->calculateDaysLate(Carbon::parse($rent->return_date),Carbon::parse($rent->actual_return_date));
                
                if ($daysLate < 0) {
                    $daysLateArray[$rent->id] = $daysLate * -1;
                }
                
                $totalFine += $fineAmount;

                $rent->fine = $fineAmount;
                $rent->save();
            }
        }

        return view('Admin.rentLogs',["rent_logs" => $rentLogs,"days_late" => $daysLateArray,"categories" => Category::all()]);
    }

    private function calculateFine($dueDate, $returnDate)
    {
        $fineAmount = 0;
        $finePerDay = 20000; // Adjust this according to your requirement

        $daysLate = $this->calculateDaysLate($dueDate, $returnDate);

        if ($daysLate < 0) {
            $fineAmount = (-1 * $daysLate) * $finePerDay;
        }

        return  number_format((int)$fineAmount, 0, '.', '.');
    }

    private function calculateDaysLate($dueDate, $returnDate)
    {   
        $daysLate = $returnDate->diffInDays($dueDate, false);

        return $daysLate;
    }

    public function adminRentLogReturn(BookRent $bookRent) {
        $bookRent->actual_return_date = Carbon::now()->format('Y-m-d');
        $bookRent->status = "Finished";
        $bookRent->book->status = "In stock";
    
        $bookRent->save();
        $bookRent->book->save();
    
        return redirect('/admin/rent-logs')->withToastSuccess('Book Returned Successfully!');
    }

    public function adminRentLogFinePay(BookRent $bookRent) {
        // dd($bookRent->fine);
        $bookRent->fine_paid = True;
        $bookRent->save();

        return redirect('/admin/rent-logs')->withToastSuccess('Fine Paid Successfully!');
    }
}
