@extends('layouts.dashboardLayout')

@section('title')
    Rent Request
@endsection

@section('page-title')
    Rent Request
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <div class="bg-white/60 flex-1 space-y-4 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
        <div class="flex justify-between flex-col space-y-4 md:space-y-0 md:flex-row">
          <h1 class="text-[#151C48] font-semibold text-base text-center md:text-start md:text-xl">Rent Request List</h1>
          <form class="flex space-x-2" action="/admin/rent-request" method="get">
            @if (request('category'))
                <input hidden type="text" name="category" value="{{ request('category') }}">
            @endif
            <input name="search" class="text-[#777A8F] flex-1 md:w-72 border-2 border-[#777A8F]/20 focus:outline-[#777A8F]/30 rounded-lg p-1.5 text-sm" type="text" value="{{ request('search')}}">
            <button type="submit" class="bg-white transition-all duration-150 hover:bg-[#777A8F]/20 hover:border-[#777A8F]/30 border-2 rounded-lg border-[#777A8F]/15 p-1.5"><img class="w-5" src="/img/icon-search.svg" alt="search-icon"></button>
          </form>
        </div>  

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
                @foreach ($rent_requests as $index => $request) 
                    <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                      <td class="py-4 pl-2">{{ $rent_requests->firstItem() + $index }}</td>
                      <td class="py-4">{{ $request->user->name }}</td>
                      <td class="py-4">{{ $request->user->email }}</td>
                      <td class="py-4">{{ $request->book->title }}</td>
                      <td class="py-4 flex space-x-2">
                        <form class="rent-request-form-accept" action="/admin/rent-request/accept/{{ $request->id }}" method="post">
                          @csrf
                          <input hidden name="from" value="rent-request" type="text">
                          <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#DCFCE7] text-[#3CD755]">Accept</button>
                        </form>
                        <form class="rent-request-form-reject" action="/admin/rent-request/reject/{{ $request->id }}" method="post">
                          @csrf
                          <input hidden name="from" value="rent-request" type="text">
                          <button type="submit" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Reject</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>

        {{-- paginator --}}
        <div class="mt-10">
          {{ $rent_requests->links() }}
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


