@extends('layouts.dashboardLayout')

@section('title')
    Dashboard
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content')

    <div class="w-full h-full flex flex-col space-y-6">
      <div class="grid justify-between gap-2 grid-cols-2 xl:grid-cols-4">
        <div class="flex w-full space-x-2 sm:space-x-3 md:space-x-6 lg:space-x-4 items-center bg-white/60 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300 px-3 sm:px-6 py-4 md:p-6 ">
          <div class="inline-block p-2 bg-[#FF5959]/20 rounded-xl">
            <img  class="w-4 md:w-8" src="/img/icon-user.svg" alt="">
          </div>
          <div>
            <p class="font-semibold md:text-xl text-[#151C48] text-sm">{{ $totalUsers }}</p>
            <p class="font-medium md:text-base text-[#777A8F] text-xs">Total Users</p>
          </div>
        </div>
        
        <div class="flex w-full space-x-2 sm:space-x-3 md:space-x-6 lg:space-x-4 items-center bg-white/60  rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300 px-3 sm:px-6 py-4 md:p-6 ">
          <div class="inline-block p-2 bg-[#E8F8FF] rounded-xl">
            <img class="w-4 md:w-8" src="/img/icon-rented-books.svg" alt="icon-rented-book">
          </div>
          <div>
            <p class="font-semibold text-sm md:text-xl text-[#151C48] ">{{ $rentedBooks }}</p>
            <p class="font-medium text-xs md:text-base text-[#777A8F]">Rented Books</p>
          </div>
        </div>

        <div class="flex w-full space-x-2 sm:space-x-3 md:space-x-6 lg:space-x-4 items-center bg-white/60  rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300 px-3 sm:px-6 py-4 md:p-6 ">
          <div class="inline-block p-2 bg-[#FFF4EF] rounded-xl">
            <img class="w-4 md:w-8" src="/img/icon-wallet.svg" alt="icon-rented-book">
          </div>
          <div>
            <p class="font-semibold text-sm md:text-xl text-[#151C48] ">{{ $totalFinedRent }}</p>
            <p class="font-medium text-xs md:text-base text-[#777A8F]">Fined Rent</p>
          </div>
        </div>
        
        <div class="flex w-full space-x-2 sm:space-x-3 md:space-x-6 lg:space-x-4 items-center bg-white/60  rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300 px-3 sm:px-6 py-4 md:p-6 ">
          <div class="inline-block p-2 bg-[#DCFCE7] rounded-xl">
            <img class="w-4 md:w-8" src="/img/icon-total-books.svg" alt="icon-rented-book">
          </div>
          <div>
            <p class="font-semibold text-sm md:text-xl text-[#151C48] ">{{ $totalBooks }}</p>
            <p class="font-medium text-xs md:text-base text-[#777A8F]">Total Books</p>
          </div>
        </div>
      </div>
      
      <div class="bg-white/60 flex-1 space-y-4 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
        <div>
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
                  @foreach ($rent_requests as $index => $request) 
                      <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                        <td class="py-4 pl-2">{{ $rent_requests->firstItem() + $index }}</td>
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


