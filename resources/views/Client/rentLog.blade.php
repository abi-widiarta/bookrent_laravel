@extends('layouts.dashboardLayout')

@section('title')
    Rent Log
@endsection

@section('page-title')
    Rent Log
@endsection

@section('content')
    <div class="w-full h-full">
        <div class="bg-white/60 flex flex-col justify-between space-y-4 w-full h-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
          <div>
            <h1 class="text-[#151C48] font-semibold text-lg md:text-xl">Rent Log List</h1>
            <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
              <table class="table-fixed mx-auto border-collapse w-[50rem] xl:w-full">
                <thead>
                  <tr class="text-[#777A8F] border-b border-[#777A8F]/20 text-xs md:text-sm">
                    <th class="text-start font-semibold py-4 w-[5%]">No</th>
                    <th class="text-start font-semibold py-4 w-[27%]">Book</th>
                    <th class="text-start font-semibold py-4 w-[11%]">Start Date</th>
                    <th class="text-start font-semibold py-4 w-[11%]">Return Date</th>
                    <th class="text-start font-semibold py-4 w-[15%]">Actual Return Date</th>
                    <th class="text-start font-semibold py-4 w-[12%]">Status</th>
                    <th class="text-start font-semibold py-4 w-[15%]">Fine Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($rent_logs->count() == 0)
                    <tr>
                      <td colspan="6" class="pt-4 text-center col-span-5 text-[#777A8F] text-xs md:text-sm">You have no rent logs.</td>
                    </tr>
                  @else
                    @foreach ($rent_logs as $index => $rent)
                      @if ($rent->actual_return_date == null)  
                        <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                      @endif
    
                      @if ($rent->return_date >= $rent->actual_return_date && $rent->actual_return_date != null )  
                        <tr class="text-[#777A8F] bg-[#DCFCE7] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                      @endif
    
                      @if ($rent->return_date < $rent->actual_return_date && $rent->actual_return_date != null && $rent->fine_paid)  
                        <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm bg-[#E8F8FF]">
                      @endif

                      @if ($rent->return_date < $rent->actual_return_date && $rent->actual_return_date != null && !$rent->fine_paid)  
                        <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm bg-[#FFE8E8]">
                      @endif

                      @if ($rent->actual_return_date == null && $rent->fine != '0' && !$rent->fine_paid)  
                        <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm bg-[#FFF4EF]">
                      @endif
    
                        <td class="py-4 pl-2">{{  $index + 1 }}</td>
                        <td class="py-4">{{ $rent->book->title }}</td>
                        <td class="py-4">{{ $rent->rent_date }}</td>
                        <td class="py-4">{{ $rent->return_date }}</td>
                        <td class="py-4">{{ $rent->actual_return_date ?? '-' }}</td>
                        <td class="text py-4 flex justify-start items-center" >
                          @if ($rent->actual_return_date == null && $rent->fine == '0')
                              In Rent Period
                          @endif

                          @if ($rent->actual_return_date == null && $rent->fine != '0' && !$rent->fine_paid)
                              Over Rent
                          @endif

                          @if ($rent->return_date >= $rent->actual_return_date && $rent->actual_return_date != null )  
                            in Time
                          @endif
                          
                          @if ($rent->return_date < $rent->actual_return_date && $rent->actual_return_date != null )
                          {{ $days_late[$rent->id] }} Days Late
                          @endif
                        
                          {{-- @dd($days_late) --}}
                        </td>
                        <td class="py-4">
                          <div class="flex items-center  {{ $rent->fine == '0' ? 'justify-center' : 'justify-between' }} w-36 px-2.5 py-2 bg-white rounded-lg border">
                            <p class="text-xs">
                              {{ $rent->fine == '0' ? '-' : 'Rp. ' . $rent->fine }}
                            </p>
                            @if ($rent->fine != '0' && $rent->fine_paid)
                              <small class="text-[#3CD755]">(paid)</small>
                            @endif
                          </div>
                        </td>
                      </tr>
                    @endforeach>
                  @endif
                  {{-- @dd($days_late) --}}
                  {{-- @dd($still_rent_late) --}}
                </tbody>
              </table>
            </div>
          </div>
          {{-- paginator --}}
          <div>
            {{ $rent_logs->links() }}
          </div>
        </div>
    </div>
@endsection