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

      <div class="bg-white/60 flex-1 space-y-4 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 xl:p-10">
        <div class="flex relative items-center justify-between mb-12">
          <a class="flex items-center rounded-lg space-x-2 py-2 pl-2 pr-4 absolute top-0 left-0 bg-[#FFE8E8] text-[#FF5050] font-semibold text-xs md:text-sm " href="/admin/books">
            <img class="w-3" src="/img/icon-chevron-back.svg" alt="">
            <p>Back</p></a>
          <h1 class="text-[#151C48] font-semibold text-center w-full text-lg md:text-2xl">Trash</h1>
        </div>  

        <div class="w-full overflow-x-scroll">
          <table class="table-fixed border-collapse w-[48rem] xl:w-full">
            <thead>
              <tr class="text-[#777A8F] border-b border-[#777A8F]/20 text-xs md:text-sm">
                <th class="text-start font-semibold py-4 w-[5%]">No</th>
                <th class="text-start font-semibold py-4 w-[35%]">Title</th>
                <th class="text-start font-semibold py-4 w-[30%]">Category</th>
                <th class="text-start font-semibold py-4 w-[15%]">Status</th>
                <th class="text-start font-semibold py-4">Action</th>
              </tr>
            </thead>
            <tbody>
  
              @foreach ($books as $book)
                <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                  <td class="py-4 pl-2">{{ $loop->iteration }}</td>
                  <td class="py-4">{{ $book->title }}</td>
                  <td class="py-4 flex items-center space-x-2">
                    @foreach ($book->categories as $category)
                      <p class="inline-block text-xs font-medium px-2 py-2 rounded-md bg-[#777A8F]/10">{{ $category->name }}</p>
                    @endforeach                
                  </td>
                  <td class="py-4 text-[#FF8B4F] font-medium text-xs md:text-sm">{{ $book->status }}</td>
                  <td class="py-4 flex space-x-2">
                    <form action="/admin/books/restore/{{ $book->id }}" method="post">
                      @csrf
                      <button class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#DCFBE7] text-[#3CD755]" type="submit">
                        Restore
                      </button>
                    </form>
                    <a href="#" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Delete</a>
                  </td>
              </tr>
              @endforeach
  
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection


