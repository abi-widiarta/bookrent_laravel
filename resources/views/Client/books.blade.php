@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')

    <div class="w-full flex justify-start flex-col h-full space-y-6 pb-4">
      <form class="flex justify-between flex-col md:flex-row">
        <div class="order-2 md:order-1">
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex justify-between text-[#777A8F] focus:outline-[#777A8F] w-40 after:hidden bg-white/10 border border-white/40 hover:bg-white/20 font-medium rounded-xl text-xs px-5 py-2.5 text-start items-center shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] md:text-sm md:w-48" type="button"> <p>{{ $selected_category == null ? 'Select Category' : $selected_category }}</p> <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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

      <div class="flex flex-1 items-start">
        <div class="w-full grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
          @foreach ($books as $book)  
          <a href="/books/show/{{ $book->id }}" class="group bg-white/60 pb-4 px-4 py-4 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] hover:shadow-[0px_11px_50px_0px_rgba(198,203,232,0.35)] hover:scale-105 transition-all duration-300">
            <div class="flex justify-center mb-4">
              <img class="h-56 border rounded-xl group-hover:-translate-y-2 group-hover:scale-110 group-hover:rotate-3 transition duration-300 shadow-lg shadow-black/10 hover:shadow-[0px_4px_10px_0px_rgba(0,0,0,0.2)] " src={{ $book->cover }} alt="book-img">
            </div>
          
            <div class="flex flex-col">
              @if ($book->status == "In stock")  
                <p class="inline-block mr-auto mb-2 text-xs text-[#3CD755] font-semibold bg-[#DCFCE7] py-2 px-2 rounded-md">{{ $book->status }}</p>
              @endif
              @if ($book->status == "Out Of Stock")  
                <p class="inline-block mr-auto mb-2 text-xs font-semibold bg-[#FFE8E8] text-[#FF5050] py-2 px-2 rounded-md">{{ $book->status }}</p>
              @endif
              @if ($book->status == "Reserved")  
                <p class="inline-block mr-auto mb-2 text-xs font-semibold bg-[#E8F8FF] text-[#41B6FF] py-2 px-2 rounded-md">{{ $book->status }}</p>
              @endif
              <p class="text-sm truncate mb-1 font-semibold text-[#777A8F]">{{ $book->title }}</p>
              <p class="text-xs truncate text-[#777A8F]">{{ $book->author }}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>

      <div>
        {{ $books->links() }}
      </div>
    </div>


    {{-- <script>
      const filterCategory = document.querySelector("#filter-category")

      filterCategory.addEventListener('change', (e) => {
        let val = filterCategory.value;
        window.location.href = '/books/?category=' + val;
      })
    
    </script> --}}
@endsection


