@extends('layouts.dashboardLayout')

@section('title')
    Rent Log
@endsection

@section('page-title')
    Rent Log
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <form class="flex justify-between flex-col md:flex-row">
        <div class="order-2 md:order-1">
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-rent-log" class="flex justify-between text-[#777A8F] focus:outline-[#777A8F] w-40 after:hidden bg-white/10 border border-white/40 hover:bg-white/20 font-medium rounded-xl text-xs px-5 py-2.5 text-start items-center shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] md:text-sm md:w-48" type="button"> <p>{{ $dropdown_text }}</p> <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdown-rent-log" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] w-40 -translate-y-20 md:mt-0 md:w-44">
            <ul class="py-2 text-xs text-[#777A8F] md:text-sm" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="/rent-logs?category=still_rented" class="block px-4 py-2 hover:bg-[#777A8F]/10">Still Rented</a>
              </li>
              <li>
                <a href="/rent-logs?category=returned_in_time" class="block px-4 py-2 hover:bg-[#777A8F]/10">Returned In Time</a>
              </li>
              <li>
                <a href="/rent-logs?category=returned_late" class="block px-4 py-2 hover:bg-[#777A8F]/10">Returned Late</a>
              </li>
              {{-- @foreach ($categories as $category)
                <li>
                  <a href="/admin/books/?category={{ $category->id }}" class="block px-4 py-2 hover:bg-[#777A8F]/10">{{ $category->name }}</a>
                </li>
              @endforeach --}}
              
            </ul>
          </div>
        </div>
        <div class="flex items-center space-x-2 order-1 md:order-2 mb-4 md:mb-0">
          <form class="flex" action="/admin/rent-logs" method="get">
            @if (request('category'))
                <input hidden type="text" name="category" value="{{ request('category') }}">
            @endif
            <input name="search" class="text-[#777A8F] flex-1 md:w-64 text-sm border-2 border-[#777A8F]/20 focus:outline-[#777A8F]/30 rounded-lg p-1.5" type="text" value="{{ request('search')}}">
            <button type="submit" class="bg-white transition-all duration-150 hover:bg-[#777A8F]/20 hover:border-[#777A8F]/30 border-2 rounded-lg border-[#777A8F]/15 p-1.5"><img class="w-5" src="/img/icon-search.svg" alt="search-icon"></button>
          </form>
        </div>
      </form>

        <div class="bg-white/60 flex flex-col justify-between space-y-4 w-full h-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
          
          <div>
            <h1 class="text-[#151C48] font-semibold text-lg md:text-xl">Rent Log List</h1>
            <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
              <table class="table-fixed mx-auto border-collapse w-[50rem] xl:w-full">
                <thead>
                  <tr class="text-[#777A8F] border-b border-[#777A8F]/20 text-xs md:text-sm">
                    <th class="text-start font-semibold pl-2.5 py-4 w-[5%]">No</th>
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
                      <td colspan="7" class="pt-4 text-center col-span-5 text-[#777A8F] text-xs md:text-sm">No data found.</td>
                    </tr>
                  @else
                    @foreach ($rent_logs as $index => $rent)
                      @if ($rent->status == 'Approved')  
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
    
                        <td class="py-4 pl-4">{{  $index + 1 }}</td>
                        <td class="py-4">{{ $rent->book->title }}</td>
                        <td class="py-4">{{ $rent->rent_date }}</td>
                        <td class="py-4">{{ $rent->return_date }}</td>
                        <td class="py-4">{{ $rent->actual_return_date ?? '-' }}</td>
                        <td class="text py-4 flex justify-start items-center" >
                          @if ($rent->status == 'Approved')
                              In Rent Period
                          @endif

                          @if ($rent->status == 'Approved' && $rent->fine != '0' && !$rent->fine_paid)
                              Over Rent
                          @endif

                          @if ($rent->return_date >= $rent->actual_return_date && $rent->fine == '0' )  
                            in Time
                          @endif
                          
                          @if ($rent->return_date < $rent->actual_return_date && $rent->fine != '0' )
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