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
            <p class="font-semibold text-sm md:text-xl text-[#151C48] ">25</p>
            <p class="font-medium text-xs md:text-base text-[#777A8F]">Fined User</p>
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
        
        {{-- <div class="flex w-full space-x-6 items-center bg-white/60 px-6 py-6 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300 ">
          <div class="inline-block p-2 bg-[#FFF4EF] rounded-xl">
            <svg width="40" height="40" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.20703 8.93739H35.707C36.0283 8.93724 36.3492 8.95762 36.6678 8.99841C36.5598 8.24024 36.2994 7.5118 35.9022 6.85701C35.5051 6.20221 34.9795 5.63462 34.357 5.18846C33.7346 4.74229 33.0283 4.4268 32.2806 4.26099C31.533 4.09519 30.7595 4.08251 30.0068 4.22372L7.39062 8.08489H7.36484C5.94522 8.35637 4.68279 9.15956 3.83539 10.3304C5.11207 9.42236 6.64034 8.93537 8.20703 8.93739ZM35.707 10.9999H8.20703C6.74883 11.0015 5.35081 11.5815 4.3197 12.6126C3.2886 13.6437 2.70862 15.0417 2.70703 16.4999V32.9999C2.70862 34.4581 3.2886 35.8561 4.3197 36.8872C5.35081 37.9183 6.74883 38.4983 8.20703 38.4999H35.707C37.1652 38.4983 38.5633 37.9183 39.5944 36.8872C40.6255 35.8561 41.2054 34.4581 41.207 32.9999V16.4999C41.2054 15.0417 40.6255 13.6437 39.5944 12.6126C38.5633 11.5815 37.1652 11.0015 35.707 10.9999ZM31.625 27.4999C31.0811 27.4999 30.5494 27.3386 30.0972 27.0364C29.6449 26.7343 29.2925 26.3048 29.0843 25.8023C28.8762 25.2998 28.8217 24.7468 28.9278 24.2134C29.0339 23.6799 29.2959 23.1899 29.6805 22.8053C30.0651 22.4208 30.5551 22.1588 31.0885 22.0527C31.6219 21.9466 32.1749 22.0011 32.6774 22.2092C33.1799 22.4174 33.6094 22.7698 33.9115 23.2221C34.2137 23.6743 34.375 24.206 34.375 24.7499C34.375 25.4792 34.0853 26.1787 33.5695 26.6944C33.0538 27.2102 32.3543 27.4999 31.625 27.4999Z" fill="#FF8B4F"/>
              <path d="M2.75 22.3008V13.75C2.75 11.8877 3.78125 8.76562 7.36055 8.0893C10.3984 7.51953 13.4062 7.51953 13.4062 7.51953C13.4062 7.51953 15.3828 8.89453 13.75 8.89453C12.1172 8.89453 12.1602 11 13.75 11C15.3398 11 13.75 13.0195 13.75 13.0195L7.34766 20.2812L2.75 22.3008Z" fill="#FF8B4F"/>
              </svg>
              
          </div>
          <div>
            <p class="font-semibold text-xl text-[#151C48] ">25</p>
            <p class="font-medium text-base text-[#777A8F]">Fined Users</p>
          </div>
        </div>
        
        <div class="flex w-full space-x-6 items-center bg-white/60 px-6 py-6 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300 ">
          <div class="inline-block p-2 bg-[#DCFCE7] rounded-xl">
            <svg width="40" height="40" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.0002 40.3334C9.99183 40.3334 9.12833 39.9741 8.40967 39.2554C7.691 38.5368 7.33228 37.6739 7.3335 36.6668V7.33342C7.3335 6.32508 7.69283 5.46158 8.4115 4.74292C9.13017 4.02425 9.99305 3.66553 11.0002 3.66675H33.0002C34.0085 3.66675 34.872 4.02608 35.5907 4.74475C36.3093 5.46342 36.6681 6.32631 36.6668 7.33342V36.6668C36.6668 37.6751 36.3075 38.5386 35.5888 39.2573C34.8702 39.9759 34.0073 40.3346 33.0002 40.3334H11.0002ZM20.1668 20.1667L24.7502 17.4168L29.3335 20.1667V7.33342H20.1668V20.1667Z" fill="#3CD755"/>
              </svg>              
          </div>
          <div>
            <p class="font-semibold text-xl text-[#151C48] ">{{ $totalBooks }}</p>
            <p class="font-medium text-base text-[#777A8F]">Total Books</p>
          </div>
        </div> --}}
        
        
      </div>
      
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


