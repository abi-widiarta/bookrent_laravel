@extends('layouts.dashboardLayout')

@section('title')
    Rent Request
@endsection

@section('page-title')
    Rent Request
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <form class="flex justify-between flex-col md:flex-row">
        <div class="order-2 md:order-1">
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex justify-between text-[#777A8F] focus:outline-[#777A8F] w-40 after:hidden bg-white/10 border border-white/40 hover:bg-white/20 font-medium rounded-xl text-xs px-5 py-2.5 text-start items-center shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] md:text-sm md:w-48" type="button"> <p>Select Category</p> <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] w-40 -translate-y-20 md:mt-0 md:w-44">
            <ul class="py-2 text-xs text-[#777A8F] md:text-sm" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="/books/?category=all" class="block px-4 py-2 hover:bg-[#777A8F]/10">All</a>
              </li>
              @foreach ($categories as $category)
                {{-- <option {{ $selected_category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option> --}}
                <li>
                  <a href="/books/?category={{ $category->id }}" class="block px-4 py-2 hover:bg-[#777A8F]/10">{{ $category->name }}</a>
                </li>
              @endforeach
              
            </ul>
          </div>
        </div>
        <div class="flex items-center space-x-2 order-1 md:order-2 mb-4 md:mb-0">
          <form class="flex" action="/books" method="get">
            @if (request('category'))
                <input hidden type="text" name="category" value="{{ request('category') }}">
            @endif
            <input name="search" class="text-[#777A8F] flex-1 md:w-64 text-sm border-2 border-[#777A8F]/20 focus:outline-[#777A8F]/30 rounded-lg p-1.5" type="text" value="{{ request('search')}}">
            <button type="submit" class="bg-white transition-all duration-150 hover:bg-[#777A8F]/20 hover:border-[#777A8F]/30 border-2 rounded-lg border-[#777A8F]/15 p-1.5"><img class="w-5" src="/img/icon-search.svg" alt="search-icon"></button>
          </form>
        </div>
      </form>

      <div class="bg-white/60 flex-1 space-y-4 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
        <h1 class="text-[#151C48] font-semibold text-base md:text-xl">Rent Request List</h1>

        <div class="w-full overflow-scroll">
          <table class="table-fixed w-[60rem] md:w-[70rem] 2xl:w-full border-collapse ">
            <thead>
              <tr class="text-[#777A8F] border-b border-[#777A8F]/20 text-xs md:text-sm">
                <th class="text-start font-semibold py-4 w-[5%]">No</th>
                <th class="text-start font-semibold py-4 w-[20%]">Name</th>
                <th class="text-start font-semibold py-4 w-[30%]">Email</th>
                <th class="text-start font-semibold py-4 w-[30%]">Book</th>
                <th class="text-start font-semibold py-4">Status</th>
              </tr>
            </thead>
            <tbody>
              @if ($rent_requests->count() == 0)
                <tr>
                  <td colspan="5" class="py-4 text-center col-span-5 text-[#777A8F] text-xs md:text-sm">There is no rent request.</td>
                </tr>
              @else
                @foreach ($rent_requests as $request) 
                    <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                      <td class="py-4 pl-2">{{ $loop->iteration }}</td>
                      <td class="py-4">{{ $request->user->name }}</td>
                      <td class="py-4">{{ $request->user->email }}</td>
                      <td class="py-4">{{ $request->book->title }}</td>
                      <td class="py-4 flex space-x-2">
                        <form class="rent-request-form-accept" action="/admin/rent-request/accept/{{ $request->id }}" method="post">
                          @csrf
                          <input hidden name="from" value="dashboard" type="text">
                          <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#DCFCE7] text-[#3CD755]">Accept</button>
                        </form>
                        <form class="rent-request-form-reject" action="/admin/rent-request/reject/{{ $request->id }}" method="post">
                          @csrf
                          <input hidden name="from" value="dashboard" type="text">
                          <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Reject</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

    const formAccept = document.querySelectorAll(".rent-request-form-accept")
    const formReject = document.querySelectorAll(".rent-request-form-reject")

    formAccept.forEach(form => {
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          
          Swal.fire({
          title: 'Warning',
          text: "Are you sure want approve this request?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3cd766',
          cancelButtonColor: '#FF3737',
          confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            } 
          })
        })
      });

    formReject.forEach(form => {
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          
          Swal.fire({
          title: 'Warning',
          text: "Are you sure want to reject this request?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3cd766',
          cancelButtonColor: '#FF3737',
          confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            } 
          })
        })
      });
    </script>

@endsection


