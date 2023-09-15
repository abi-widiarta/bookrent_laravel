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

        foreach ($rentLogs as $rent) {
            $currentDate = Carbon::now();
            // dd($rent);
            if ($rent->actual_return_date != null) {
                $fineAmount = $this->calculateFine(Carbon::parse($rent->return_date),Carbon::parse($rent->actual_return_date));
                $totalFine += $fineAmount;
    
                // Update the rental with the fine amount (if needed)
                $rent->fine = $fineAmount;
                $rent->save();
            }
        }

        // $rentLogs->save();


        

        return view('Admin.rentLogs',["rent_logs" => $rentLogs,"categories" => Category::all()]);
    }

    private function calculateFine($dueDate, $returnDate)
    {
        $fineAmount = 0;
        $finePerDay = 20000; // Adjust this according to your requirement

        $daysLate = $returnDate->diffInDays($dueDate, false);

        if ($daysLate < 0) {
            $fineAmount = (-1 * $daysLate) * $finePerDay;
        }

        return  number_format((int)$fineAmount, 0, '.', '.');
    }

    public function adminRentLogReturn(BookRent $bookRent) {
        $bookRent->actual_return_date = Carbon::now()->format('Y-m-d');
        $bookRent->status = "Finished";
        $bookRent->book->status = "In stock";
    
        $bookRent->save();
        $bookRent->book->save();
    
        return redirect('/admin/rent-logs')->withToastSuccess('Book Returned Successfully!');
    }
}
