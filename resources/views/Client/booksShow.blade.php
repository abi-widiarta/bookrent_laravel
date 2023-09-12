@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full">
        <div class="bg-white/60  flex flex-col items-start space-y-6 w-full px-14 pt-6 pb-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
          <a class="flex items-center rounded-lg space-x-2 py-2 pl-2 pr-4 hover:opacity-75 hover:-translate-y-0.5 transition-all duration-300 bg-[rgb(255,232,232)] text-[#FF5050] text-xs font-semibold" href="/books">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.7731 0.25116C13.8451 0.330666 13.9021 0.42509 13.941 0.52903C13.98 0.632969 14 0.744386 14 0.856905C14 0.969425 13.98 1.08084 13.941 1.18478C13.9021 1.28872 13.8451 1.38314 13.7731 1.46265L7.86928 8.00013L13.7731 14.5376C13.845 14.6171 13.902 14.7116 13.9409 14.8155C13.9798 14.9195 13.9998 15.0308 13.9998 15.1433C13.9998 15.2558 13.9798 15.3672 13.9409 15.4712C13.902 15.5751 13.845 15.6695 13.7731 15.7491C13.7013 15.8286 13.616 15.8917 13.5221 15.9348C13.4282 15.9778 13.3276 16 13.226 16C13.1244 16 13.0238 15.9778 12.9299 15.9348C12.836 15.8917 12.7507 15.8286 12.6789 15.7491L6.22686 8.60587C6.15494 8.52636 6.09789 8.43194 6.05896 8.328C6.02004 8.22406 6 8.11265 6 8.00013C6 7.88761 6.02004 7.77619 6.05896 7.67225C6.09789 7.56831 6.15494 7.47389 6.22686 7.39438L12.6789 0.25116C12.7507 0.171539 12.836 0.108375 12.9299 0.0652784C13.0237 0.0221819 13.1244 1.43714e-07 13.226 1.43714e-07C13.3276 1.43714e-07 13.4283 0.0221819 13.5222 0.0652784C13.616 0.108375 13.7013 0.171539 13.7731 0.25116Z" fill="#FF5050"/>
              </svg>
            <p>Back</p>
          </a>
          <div class="flex space-x-12">
            <div  data-tilt class="flex  js-tilt justify-center items-start mb-4 rounded-xl">
                <img  class="w-72  border rounded-xl   shadow-[0px_10px_20px_0px_rgba(0,0,0,0.15)]  transition-all duration-300" src={{ $book->cover }} alt="book-img">
            </div>
            <div class=" flex-1 flex flex-col items-start justify-between pb-4">
              <div>
                @if ($book->status == "In stock")
                  <p class="inline-block mr-auto mb-3 text-xs text-[#3CD755] font-semibold bg-[#DCFCE7] py-2 px-2 rounded-md">{{ $book->status }}</p>
                @else
                  <p class="inline-block mr-auto mb-3 text-xs font-semibold bg-[#FFE8E8] text-[#FF5050] py-2 px-2 rounded-md">{{ $book->status }}</p>
                @endif
                <p class="text-lg truncate mb-2 font-semibold text-[#777A8F]">{{ $book->title }}</p>
                <p class="text-base mb-4 font-medium text-[#777A8F]/80">{{ $book->author }}</p>
                <div class="space-x-2 mb-8">
  
                  @foreach ($book->categories as $category)  
                    <p class="inline-block py-2 px-4 rounded-md bg-[#777A8F]/10 text-[#777A8F] text-xs font-medium">{{ $category->name }}</p>
                  @endforeach
                  {{-- <p class="inline-block py-2 px-4 rounded-md bg-[#777A8F]/10 text-[#777A8F] text-xs font-medium">Algoritm</p>
                  <p class="inline-block py-2 px-4 rounded-md bg-[#777A8F]/10 text-[#777A8F] text-xs font-medium">Code</p> --}}
                </div>
                
                <p class="w-[90%] text-ellipsis overflow-hidden  text-sm text-[#777A8F] ">
                  {{ $book->description }}
                </p>
              </div>

              <form id="rent-request-form" action="/books/rent/{{ $book->id }}" method="post">
                @csrf
                <button type="submit" class="text-white text-sm py-2.5 font-medium px-12 bg-[#FF3737] hover:opacity-80 transition-all duration-150 rounded-xl">
                  Request For Rent
                </button>
              </form>
    
            </div>
          </div>
        </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      glare: true,
      maxGlare: .5,
      maxTilt:        15,
      perspective:    1000,   // Transform perspective, the lower the more extreme the tilt gets.
      easing:         "cubic-bezier(.03,.98,.52,.99)",    // Easing on enter/exit.
      scale:          1.05,      // 2 = 200%, 1.5 = 150%, etc..
      speed:          300,    // Speed of the enter/exit transition.
      transition:     true,   // Set a transition on enter/exit.
      disableAxis:    null,   // What axis should be disabled. Can be X or Y.
      reset:          true,   // If the tilt effect has to be reset on exit.
    })


    const form = document.querySelector("#rent-request-form")

    form.addEventListener("submit", (e) => {
      e.preventDefault();
      
      Swal.fire({
      title: 'Warning',
      text: "Are you sure want to rent this book?",
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
  </script>
@endsection