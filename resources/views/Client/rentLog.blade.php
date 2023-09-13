@extends('layouts.dashboardLayout')

@section('title')
    Rent Log
@endsection

@section('page-title')
    Rent Log
@endsection

@section('content')
    <div class="w-full">
     
        <div class="bg-white/60 space-y-4 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-8 md:px-10 md:py-10">
          <h1 class="text-[#151C48] font-semibold text-xl">Rent Log List</h1>

          <div class="w-full overflow-scroll">
            <table class="table-fixed border-collapse w-[50rem] md:w-full">
              <thead>
                <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20">
                  <th class="text-start font-semibold py-4 w-[5%]">No</th>
                  <th class="text-start font-semibold py-4 w-[30%]">Book</th>
                  <th class="text-start font-semibold py-4 w-[15%]">Start Date</th>
                  <th class="text-start font-semibold py-4 w-[15%]">Return Date</th>
                  <th class="text-start font-semibold py-4 w-[20%]">Actual Return Date</th>
                  <th class="text-start font-semibold py-4">Status</th>
                </tr>
              </thead>
              <tbody>
                @if ($rent_logs->count() == 0)
                  <tr>
                    <td colspan="6" class="pt-4 text-center col-span-5 text-sm text-[#777A8F]">You have no rent logs.</td>
                  </tr>
                @else
                  @foreach ($rent_logs as $rent)
                    @if ($rent->actual_return_date == null)  
                      <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
                    @endif
  
                    @if ($rent->return_date >= $rent->actual_return_date && $rent->actual_return_date != null )  
                      <tr class="text-[#777A8F] bg-[#DCFCE7] text-sm border-b border-[#777A8F]/20 py-8">
                    @endif
  
                    @if ($rent->return_date < $rent->actual_return_date && $rent->actual_return_date != null )  
                      <tr class="text-[#777A8F] bg-[#FFE8E8] text-sm border-b border-[#777A8F]/20 py-8">
                    @endif
  
                      <td class="py-4 pl-2">{{ $loop->iteration }}</td>
                      <td class="py-4">{{ $rent->book->title }}</td>
                      <td class="py-4">{{ $rent->rent_date }}</td>
                      <td class="py-4">{{ $rent->return_date }}</td>
                      <td class="py-4">{{ $rent->actual_return_date ?? '-' }}</td>
                      <td class="text py-4 flex justify-start items-center" >
                        @if ($rent->status != "Finished")    
                          <form class="ml-5" action="/admin/rent-logs/return/{{ $rent->id }}" method="post">
                            @csrf
                              <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs p-1.5 font-medium bg-[#DCFCE7] text-[#3CD755]">
                                <svg width="14" height="15" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_179_8)">
                                  <path d="M15.6645 3.49976C16.111 3.91479 16.111 4.58882 15.6645 5.00386L6.52167 13.5039C6.07524 13.9189 5.35024 13.9189 4.90381 13.5039L0.33238 9.25386C-0.114049 8.83882 -0.114049 8.16479 0.33238 7.74976C0.778809 7.33472 1.50381 7.33472 1.95024 7.74976L5.71452 11.246L14.0502 3.49976C14.4967 3.08472 15.2217 3.08472 15.6681 3.49976H15.6645Z" fill="#3CD755"/>
                                  </g>
                                  <defs>
                                  <clipPath id="clip0_179_8">
                                  <rect width="16" height="17" fill="white"/>
                                  </clipPath>
                                  </defs>
                                  </svg>
                              </button>
                          </form>
                        @else
                          In Time
                        @endif
                      </td>
                    </tr>
                  @endforeach>
                @endif
              </tbody>
            </table>
          </div>

        </div>
    </div>
@endsection