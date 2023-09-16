@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <form class="flex justify-between flex-col md:flex-row">
        <div class="order-2 md:order-1">
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex justify-between text-[#777A8F] focus:outline-[#777A8F] w-40 after:hidden bg-white/10 border border-white/40 hover:bg-white/20 font-medium rounded-xl text-xs px-5 py-2.5 text-start items-center shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] md:text-sm md:w-48" type="button"> <p>Still Rented</p> <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] w-40 -translate-y-20 md:mt-0 md:w-44">
            <ul class="py-2 text-xs text-[#777A8F] md:text-sm" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="/admin/rent-logs?category=still_rented" class="block px-4 py-2 hover:bg-[#777A8F]/10">Still Rented</a>
              </li>
              <li>
                <a href="/admin/rent-logs?category=returned_in_time" class="block px-4 py-2 hover:bg-[#777A8F]/10">Returned In Time</a>
              </li>
              <li>
                <a href="/admin/rent-logs?category=returned_late" class="block px-4 py-2 hover:bg-[#777A8F]/10">Returned Late</a>
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
      <div class="bg-white/60 flex-1 flex flex-col justify-between  w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
        <div class="space-y-4">
          <div class="flex justify-between flex-col space-y-4 md:space-y-0 md:flex-row">
            <h1 class="text-[#151C48] font-semibold text-base text-center md:text-start md:text-xl">Rent Log List</h1>
            {{-- <form class="flex space-x-2" action="/admin/rent-logs" method="get">
              @if (request('category'))
                  <input hidden type="text" name="category" value="{{ request('category') }}">
              @endif
              <input name="search" class="text-[#777A8F] flex-1 md:w-72 border-2 border-[#777A8F]/20 focus:outline-[#777A8F]/30 rounded-lg p-1.5 text-sm" type="text" value="{{ request('search')}}">
              <button type="submit" class="bg-white transition-all duration-150 hover:bg-[#777A8F]/20 hover:border-[#777A8F]/30 border-2 rounded-lg border-[#777A8F]/15 p-1.5"><img class="w-5" src="/img/icon-search.svg" alt="search-icon"></button>
            </form> --}}
          </div>  
          <div class="w-full overflow-scroll">
            <table class="table-fixed border-collapse w-[96rem] 2xl:w-[100rem]">
              <thead>
                <tr class="text-[#777A8F] border-b border-[#777A8F]/20 text-xs md:text-sm">
                  <th class="text-start font-medium px-2 py-4 w-[3%]">No</th>
                  <th class="text-start font-medium py-4 w-[15%]">Name</th>
                  <th class="text-start font-medium py-4 w-[20%]">Email</th>
                  <th class="text-start font-medium py-4 w-[15%]">Book</th>
                  <th class="text-start font-medium py-4 w-[7%]">Start Date</th>
                  <th class="text-start font-medium py-4 w-[7%]">Return Date</th>
                  <th class="text-start font-medium py-4 w-[8%]">Act Return Date</th>
                  <th class="text-start font-medium py-4 w-[10%]">Fine Amount</th>
                  <th class="text-start font-medium py-4 w-[7%]">Returned</th>
                </tr>
              </thead>
              <tbody>
                @if ($rent_logs->count() == 0)
                    <tr>
                      <td colspan="5" class="pt-4 text-center col-span-5 text-[#777A8F] text-xs md:text-sm">There is no rent logs.</td>
                    </tr>
                @else
                  @foreach ($rent_logs as $index => $rent)
                    @if ($rent->actual_return_date == null && $rent->fine == '0')  
                      <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-0 text-xs md:text-sm">
                    @endif

                    @if ($rent->actual_return_date == null && $rent->fine != '0')  
                      <tr class="text-[#777A8F] bg-[#FFF4EF] border-b border-[#777A8F]/20 py-0 text-xs md:text-sm">
                    @endif
    
                    @if ($rent->return_date >= $rent->actual_return_date && $rent->actual_return_date != null )  
                      <tr class="text-[#777A8F] bg-[#DCFCE7] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                    @endif
    
                    @if ($rent->return_date < $rent->actual_return_date && $rent->actual_return_date != null )
                        @if ($rent->fine != '0' && $rent->fine_paid)
                          <tr class="text-[#777A8F] bg-[#E8F8FF] border-b border-[#777A8F]/20 py-0 text-xs md:text-sm">
                        @else
                          <tr class="text-[#777A8F] bg-[#FFE8E8] border-b border-[#777A8F]/20 py-0 text-xs md:text-sm">
                        @endif
                    @endif
    
                      <td class="py-4 pl-4">{{ $rent_logs->firstItem() + $index}}</td>
                      <td class="py-4">{{ $rent->user->name }}</td>
                      <td class="py-4">{{ $rent->user->email }}</td>
                      <td class="py-4">{{ $rent->book->title }}</td>
                      <td class="py-4">{{ $rent->rent_date }}</td>
                      <td class="py-4">{{ $rent->return_date }}</td>
                      <td class="py-4">{{ $rent->actual_return_date ?? '-' }}</td>
                      <td class="py-4">
                        <div class="flex items-center  {{ $rent->fine == '0' ? 'justify-center' : 'justify-between' }} w-36 px-2.5 py-2 bg-white rounded-lg border">
                          <p class="text-xs">
                            {{ $rent->fine == '0' ? '-' : 'Rp. ' . $rent->fine }}
                          </p>
                          @if ($rent->fine != '0' && $rent->fine_paid)
                            <small class="text-[#3CD755]">(paid)</small>
                          @endif

                          @if ($rent->fine != '0' && !$rent->fine_paid && $rent->actual_return_date != null)
                            <form class="ml-5" action="/admin/rent-logs/fine/pay/{{ $rent->id }}" method="post">
                              @csrf
                                <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs p-1.5 font-medium rounded-md bg-[#FFF4EF] text-[#3CD755]">
                                  <svg width="10" height="11" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_179_8)">
                                    <path d="M15.6645 3.49976C16.111 3.91479 16.111 4.58882 15.6645 5.00386L6.52167 13.5039C6.07524 13.9189 5.35024 13.9189 4.90381 13.5039L0.33238 9.25386C-0.114049 8.83882 -0.114049 8.16479 0.33238 7.74976C0.778809 7.33472 1.50381 7.33472 1.95024 7.74976L5.71452 11.246L14.0502 3.49976C14.4967 3.08472 15.2217 3.08472 15.6681 3.49976H15.6645Z" fill="#FF8B4F"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_179_8">
                                    <rect width="16" height="17" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </button>
                            </form>
                          @endif
                        </div>
                      </td>
                      <td class="h-full py-4 flex justify-start items-center">
                        @if ($rent->status != "Finished")    
                          <form id="rent-request-form-return" class="ml-5" action="/admin/rent-logs/return/{{ $rent->id }}" method="post">
                            @csrf
                              <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs p-1.5 font-medium rounded-md bg-[#DCFCE7] text-[#3CD755]">
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
                          @if ($rent->return_date >= $rent->actual_return_date && $rent->actual_return_date != null )  
                            In Time
                          @endif
          
                          @if ($rent->return_date < $rent->actual_return_date && $rent->actual_return_date != null )  
                            {{ $days_late[$rent->id] }} days late
                          @endif
                        @endif
                      </td>
                    </tr>
                  @endforeach>
                @endif
              </tbody>
            </table>
          </div>
        </div>

        {{-- paginator --}}
        <div class="mt-10">
          {{ $rent_logs->links() }}
        </div>
        
      </div>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
  
        const formReturn = document.querySelector("#rent-request-form-return")
          
        formReturn.addEventListener("submit", (e) => {
          e.preventDefault();
          
          Swal.fire({
          title: 'Warning',
          text: "Are you sure want to return this book?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3cd766',
          cancelButtonColor: '#FF3737',
          confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              formReturn.submit();
            } 
          })
        })

      </script>
      
@endsection


