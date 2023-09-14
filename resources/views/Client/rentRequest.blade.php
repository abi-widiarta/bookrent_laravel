@extends('layouts.dashboardLayout')

@section('title')
    Rent Request
@endsection

@section('page-title')
    Rent Request
@endsection

@section('content')
    <div class="w-full h-full">
        <div class="bg-white/60 flex flex-col justify-between w-full h-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
          <div class="space-y-4">
            <h1 class="text-[#151C48] font-semibold text-lg md:text-xl">Rent Request</h1>
            <div class="w-full overflow-y-hidden overflow-x-scroll xl:overflow-x-hidden">
              <table class="table-fixed w-[40rem] mx-auto border-collapse md:w-full">
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
                      <td colspan="5" class="pt-4 text-center col-span-5 text-[#777A8F] text-xs md:text-sm">You have no rent request.</td>
                    </tr>
                  @else
                    @foreach ($rent_requests as $index => $request)
                      <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                        <td class="py-4 pl-2">{{ $rent_requests->firstItem() + $index }}</td>
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
          {{-- paginator --}}
          <div>
            {{ $rent_requests->links() }}
          </div>
        </div>
    </div>
@endsection