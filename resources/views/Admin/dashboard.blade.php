@extends('layouts.dashboardLayout')

@section('title')
    Dashboard
@endsection

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <div class="flex justify-between gap-6">
        <div class="flex space-x-6 items-center bg-white/60 w-[25%] px-6 py-6 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300">
          <div class="inline-block p-2 bg-[#FF5959]/20 rounded-xl">
            <svg width="40" height="40" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_78_644)">
              <path d="M22 23.8334C26.3927 23.8334 30.3875 25.1057 33.3263 26.8969C34.793 27.7952 36.047 28.8494 36.9527 29.9952C37.8437 31.1246 38.5 32.4739 38.5 33.9167C38.5 35.4659 37.7465 36.6869 36.6612 37.5578C35.6345 38.3827 34.2797 38.9291 32.8405 39.3104C29.9475 40.0749 26.0865 40.3334 22 40.3334C17.9135 40.3334 14.0525 40.0767 11.1595 39.3104C9.72033 38.9291 8.3655 38.3827 7.33883 37.5578C6.25167 36.6851 5.5 35.4659 5.5 33.9167C5.5 32.4739 6.15633 31.1246 7.04733 29.9952C7.953 28.8494 9.20517 27.7952 10.6737 26.8969C13.6125 25.1057 17.6092 23.8334 22 23.8334ZM22 3.66675C24.4312 3.66675 26.7627 4.63252 28.4818 6.3516C30.2009 8.07069 31.1667 10.4023 31.1667 12.8334C31.1667 15.2646 30.2009 17.5961 28.4818 19.3152C26.7627 21.0343 24.4312 22.0001 22 22.0001C19.5688 22.0001 17.2373 21.0343 15.5182 19.3152C13.7991 17.5961 12.8333 15.2646 12.8333 12.8334C12.8333 10.4023 13.7991 8.07069 15.5182 6.3516C17.2373 4.63252 19.5688 3.66675 22 3.66675Z" fill="#FF3737" fill-opacity="0.86"/>
              </g>
              <defs>
              <clipPath id="clip0_78_644">
              <rect width="44" height="44" fill="white"/>
              </clipPath>
              </defs>
            </svg>
          </div>
          <div>
            <p class="font-semibold text-xl text-[#151C48] ">{{ $totalUsers }}</p>
            <p class="font-medium text-base text-[#777A8F]">Total Users</p>
          </div>
        </div>
        
        <div class="flex space-x-6 items-center bg-white/60 w-[25%] px-6 py-6 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300">
          <div class="inline-block p-2 bg-[#E8F8FF] rounded-xl">
            <svg width="40" height="40" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M22 2.75V12.375C22 13.4681 22.4338 14.5164 23.2062 15.2899C23.9786 16.0633 25.0264 16.4985 26.1195 16.5H35.7445V19.3462C34.3164 19.5936 33.0001 20.2776 31.977 21.3042L20.1877 33.0935C18.8559 34.4247 17.9111 36.093 17.4543 37.9197L16.6238 41.2445H12.375C11.281 41.2445 10.2318 40.8099 9.45818 40.0363C8.6846 39.2627 8.25 38.2135 8.25 37.1195V6.875C8.25 5.78098 8.6846 4.73177 9.45818 3.95818C10.2318 3.1846 11.281 2.75 12.375 2.75H22ZM35.7445 22.165C35.0566 22.3683 34.4307 22.7408 33.924 23.2485L22.1375 35.035C21.1593 36.0138 20.4654 37.24 20.13 38.5825L19.2968 41.9127C19.2267 42.1933 19.2304 42.4873 19.3074 42.766C19.3845 43.0448 19.5323 43.2989 19.7365 43.5037C19.9407 43.7085 20.1944 43.857 20.473 43.9348C20.7515 44.0126 21.0455 44.017 21.3263 43.9477L24.6565 43.1145C25.9991 42.7792 27.2253 42.0853 28.204 41.107L39.996 29.315C40.6716 28.6409 41.103 27.7607 41.2221 26.8138C41.3413 25.8669 41.1412 24.9073 40.6537 24.0868C40.1662 23.2664 39.4189 22.6319 38.5303 22.2838C37.6417 21.9357 36.6596 21.8939 35.7445 22.165ZM24.7445 3.4375V12.375C24.7445 12.7397 24.8894 13.0894 25.1472 13.3473C25.4051 13.6051 25.7548 13.75 26.1195 13.75H35.057L24.7445 3.4375Z" fill="#41B6FF"/>
              </svg>
              
          </div>
          <div>
            <p class="font-semibold text-xl text-[#151C48] ">17</p>
            <p class="font-medium text-base text-[#777A8F]">Rented Books</p>
          </div>
        </div>
        
        <div class="flex space-x-6 items-center bg-white/60 w-[25%] px-6 py-6 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300">
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
        
        <div class="flex space-x-6 items-center bg-white/60 w-[25%] px-6 py-6 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  transition-all duration-300">
          <div class="inline-block p-2 bg-[#DCFCE7] rounded-xl">
            <svg width="40" height="40" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.0002 40.3334C9.99183 40.3334 9.12833 39.9741 8.40967 39.2554C7.691 38.5368 7.33228 37.6739 7.3335 36.6668V7.33342C7.3335 6.32508 7.69283 5.46158 8.4115 4.74292C9.13017 4.02425 9.99305 3.66553 11.0002 3.66675H33.0002C34.0085 3.66675 34.872 4.02608 35.5907 4.74475C36.3093 5.46342 36.6681 6.32631 36.6668 7.33342V36.6668C36.6668 37.6751 36.3075 38.5386 35.5888 39.2573C34.8702 39.9759 34.0073 40.3346 33.0002 40.3334H11.0002ZM20.1668 20.1667L24.7502 17.4168L29.3335 20.1667V7.33342H20.1668V20.1667Z" fill="#3CD755"/>
              </svg>              
          </div>
          <div>
            <p class="font-semibold text-xl text-[#151C48] ">{{ $totalBooks }}</p>
            <p class="font-medium text-base text-[#777A8F]">Total Books</p>
          </div>
        </div>
        
        
      </div>
      
      <div class="bg-white/60 flex-1 space-y-4 w-full px-10 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
        <h1 class="text-[#151C48] font-semibold text-xl">Rent Request List</h1>

        <table class="table-fixed w-full border-collapse ">
          <thead>
            <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 ">
              <th class="text-start font-semibold py-4 w-[5%]">No</th>
              <th class="text-start font-semibold py-4 w-[20%]">Name</th>
              <th class="text-start font-semibold py-4 w-[35%]">Email</th>
              <th class="text-start font-semibold py-4 w-[25%]">Book</th>
              <th class="text-start font-semibold py-4">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
              <td class="py-4 pl-2">1</td>
              <td class="py-4">I Wayan Abi Widiarta</td>
              <td class="py-4">abiwidiarta@student.telkomuniversity.ac.id</td>
              <td class="py-4">Algoritma Pemrograman</td>
              <td class="py-4 flex space-x-2">
                <a href="#" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#DCFCE7] text-[#3CD755]">Accept</a>
                <a href="#" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Reject</a>
              </td>
            </tr>
            <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
              <td class="py-4 pl-2">2</td>
              <td class="py-4">I Wayan Abi Widiarta</td>
              <td class="py-4">abiwidiarta@student.telkomuniversity.ac.id</td>
              <td class="py-4">Algoritma Pemrograman</td>
              <td class="py-4 flex space-x-2">
                <a href="#" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#DCFCE7] text-[#3CD755]">Accept</a>
                <a href="#" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Reject</a>
              </td>
            </tr>
     
          </tbody>
        </table>
      </div>
    </div>
@endsection


