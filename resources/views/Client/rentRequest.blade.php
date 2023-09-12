@extends('layouts.dashboardLayout')

@section('title')
    Rent Request
@endsection

@section('page-title')
    Rent Request
@endsection

@section('content')
    <div class="w-full">
        <div class="bg-white/60 space-y-4  w-full px-10 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
          <h1 class="text-[#151C48] font-semibold text-xl">Rent Request</h1>

          <table class="table-fixed w-full border-collapse ">
            <thead>
              <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 ">
                <th class="text-start font-semibold py-4 w-[5%]">No</th>
                <th class="text-start font-semibold py-4 w-[45%]">Book</th>
                <th class="text-start font-semibold py-4 w-[18%]">Start Date</th>
                <th class="text-start font-semibold py-4 w-[18%]">Return Date</th>
                <th class="text-start font-semibold py-4">Status</th>
              </tr>
            </thead>
            <tbody>

              @if ($rent_requests->count() == 0)
                <tr>
                  <td colspan="5" class="pt-4 text-center col-span-5 text-sm text-[#777A8F]">You have no rent request.</td>
                </tr>
              @else
                @foreach ($rent_requests as $request)
                  <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
                    <td class="py-4 pl-2">{{ $loop->iteration }}</td>
                    <td class="py-4">{{ $request->book->title }}</td>
                    <td class="py-4">{{ $request->rent_date == null ? '-' : $request->rent_date }}</td>
                    <td class="py-4">{{ $request->return_date == null ? '-' : $request->return_date }}</td>
                    <td class="py-4">
                      @if ($request->status == "Waiting Approval")   
                        <p class="inline-block text-xs px-4 py-2 font-medium bg-[#FFF4EF] text-[#FF8B4F]">Waiting Approval</p>
                      @endif

                      @if ($request->status == "Approved")  
                        <p class="inline-block text-xs px-4 py-2 font-medium bg-[#DCFCE7] text-[#3CD755]">Approved</p>
                        @endif
                        
                      @if ($request->status == "Rejected")
                        <p class="inline-block text-xs px-4 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Rejected</p>
                      @endif
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
    </div>
@endsection