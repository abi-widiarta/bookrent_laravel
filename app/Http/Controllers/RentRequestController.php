<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BookRent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentRequestController extends Controller
{
    public function clientRentRequest() {
        return view('Client.rentRequest',["rent_requests" => BookRent::where('user_id',Auth::user()->id)->where('status', '!=','Finished')->orderBy('id', 'desc')->paginate(5)->withQueryString()]);
    }

    public function adminRentRequest() {
        return view('Admin.rentRequest',["rent_requests" => BookRent::filter(request(['search','category']))->where('status','Waiting Approval')->orderBy('id', 'desc')->paginate(10)->withQueryString(),"categories" => Category::all()]);
    }

    public function adminRentRequestAccept(BookRent $bookRent,Request $request) {
        $bookRent->status = "Approved";
        $bookRent->rent_date = Carbon::now()->format('Y-m-d');
        $bookRent->return_date = Carbon::now()->addDays(3)->format('Y-m-d');
    
        $bookRent->book->status = "Out Of Stock";
        $bookRent->save();
        $bookRent->book->save();
    
        if ($request->from == "dashboard") {
            return redirect('/admin/dashboard')->withToastSuccess('Request approved successfully!');
        } else if ($request->from == "rent-request") {
            return redirect('/admin/rent-request')->withToastSuccess('Request approved successfully!');
        }
    }

    public function adminRentRequestReject(BookRent $bookRent,Request $request) {
        $bookRent->book->status = "In stock";
        $bookRent->book->save();
        
        $bookRent->status = "Rejected";
        $bookRent->save();
    
        if ($request->from == "dashboard") {
            return redirect('/admin/dashboard')->withToastSuccess('Request rejected successfully!');
        } else if ($request->from == "rent-request") {
            return redirect('/admin/rent-request')->withToastSuccess('Request rejected successfully!');
        }
    }

}
