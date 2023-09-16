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
        $rentLogs = BookRent::where('user_id', Auth::user()->id)
                    ->where(function($query) {
                        $query->where('status', 'Approved')
                            ->orWhere('status', 'Finished');
                    })
                    ->orderByRaw("CASE WHEN status = 'Approved' THEN 1 WHEN status = 'Finished' THEN 2 ELSE 3 END")
                    ->orderBy('id', 'desc')->paginate(10)->withQueryString();
        
        $daysLate = 0;
        $daysLateArray = [];

        foreach ($rentLogs as $rent) {
            $daysLate = $this->calculateDaysLate(Carbon::parse($rent->return_date),Carbon::parse($rent->actual_return_date));
            $fineAmount = $this->calculateFine(Carbon::parse($rent->return_date),Carbon::now());

            if ($daysLate < 0) {
                $daysLateArray[$rent->id] = -1 * $daysLate;
            }

            if(Carbon::now() > Carbon::parse($rent->return_date) && $rent->actual_return_date == null) {
                $currentDate = Carbon::now('Asia/Jakarta')->format('Y-m-d');
                $fineAmount = $this->calculateFine(Carbon::parse($rent->return_date),Carbon::parse($currentDate));

                $daysLateArray[$rent->id] = -1 *  Carbon::parse($currentDate)->diffInDays(Carbon::parse($rent->return_date), false);

                $rent->fine = $fineAmount;
                $rent->save();
            }
        }
        // dd($stillRentLate);


        return view('Client.rentLog',["rent_logs" => $rentLogs,"days_late" => $daysLateArray]);
    }

    public function adminRentLog() {
        $rentLogs = BookRent::with(['user','book'])->filter(request(['search','category']))
                        ->where(function($query) {
                            $query->where('status', 'Approved')
                                ->orWhere('status', 'Finished');
                        })->orderByRaw("CASE WHEN status = 'Approved' THEN 1 WHEN status = 'Finished' THEN 2 ELSE 3 END")
                        ->orderBy('id','desc')->paginate(10)->withQueryString();

        $daysLate = 0;
        $daysLateArray = [];

        foreach ($rentLogs as $rent) {
            if ($rent->actual_return_date != null) {
                $fineAmount = $this->calculateFine(Carbon::parse($rent->return_date),Carbon::parse($rent->actual_return_date));
                $daysLate = $this->calculateDaysLate(Carbon::parse($rent->return_date),Carbon::parse($rent->actual_return_date));
                
                if ($daysLate < 0) {
                    $daysLateArray[$rent->id] = $daysLate * -1;
    
                    $rent->fine = $fineAmount;
                    $rent->save();
                }
            }

            if(Carbon::now() > Carbon::parse($rent->return_date) && $rent->actual_return_date == null) {
                $currentDate = Carbon::now('Asia/Jakarta')->format('Y-m-d');
                $fineAmount = $this->calculateFine(Carbon::parse($rent->return_date),Carbon::parse($currentDate));

                $daysLateArray[$rent->id] = -1 *  Carbon::parse($currentDate)->diffInDays(Carbon::parse($rent->return_date), false);

                $rent->fine = $fineAmount;
                $rent->save();
            }
        }

        return view('Admin.rentLogs',["rent_logs" => $rentLogs,"days_late" => $daysLateArray,"categories" => Category::all()]);
    }

    private function calculateFine($dueDate, $returnDate)
    {
        $fineAmount = 0;
        $finePerDay = 20000;

        $daysLate = $this->calculateDaysLate($dueDate, $returnDate);

        if ($daysLate < 0) {
            $fineAmount = (-1 * $daysLate) * $finePerDay;
        }

        return number_format((int)$fineAmount, 0, '.', '.');
    }

    private function calculateDaysLate($dueDate, $returnDate)
    {   
        $daysLate = $returnDate->diffInDays($dueDate, false);

        return $daysLate;
    }

    public function adminRentLogReturn(BookRent $bookRent) {
        $bookRent->actual_return_date = Carbon::now('Asia/Jakarta')->format('Y-m-d');
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
