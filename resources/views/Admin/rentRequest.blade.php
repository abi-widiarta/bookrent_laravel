@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <form class="flex justify-between ">
        <select class="text-[#777A8F] focus:outline-[#777A8F] w-48 after:hidden bg-white/10 border border-white/40 hover:bg-white/20 font-medium rounded-xl text-sm px-5 py-2.5 text-start items-center shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)]" name="category" id="category">
          <option class="bg-white/10 rounded-lg" value="volvo">All <img src="/img/icon-chevron.svg" alt=""></option>
          <option value="saab">Saab</option>
          <option value="opel">Opel</option>
          <option value="audi">Audi</option>
        </select>

        <div class="flex items-center space-x-2">
          <input class="text-[#777A8F] w-64 text-sm border-2 border-[#777A8F]/15 focus:outline-[#777A8F]/30 rounded-lg p-1.5" type="text">
          <a href="#" class="bg-white transition-all duration-150 hover:bg-[#777A8F]/20 hover:border-[#777A8F]/30 border-2 rounded-lg border-[#777A8F]/15 p-1.5"><img class="w-5" src="/img/icon-search.svg" alt="search-icon"></a>
        </div>
      </form>

      <div class="bg-white/60 flex-1 space-y-4 w-full px-10 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
        <h1 class="text-[#151C48] font-semibold text-xl">Rent Request List</h1>
          <table class="table-fixed w-full border-collapse ">
            <thead>
              <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 ">
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
                  <td colspan="5" class="py-4 text-center col-span-5 text-sm text-[#777A8F]">There is no rent request.</td>
                </tr>
                @else
                  @foreach ($rent_requests as $request) 
                      <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
                        <td class="py-4 pl-2">{{ $loop->iteration }}</td>
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


