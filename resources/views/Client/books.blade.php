@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full space-y-6 pb-10">
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

      <div class="grid grid-cols-4 gap-8">
        @foreach ($books as $book)  
          <a href="/books/show/{{ $book->id }}" class="group bg-white/60 pb-4 px-4 py-4 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] hover:shadow-[0px_11px_50px_0px_rgba(198,203,232,0.35)] hover:scale-105 transition-all duration-300">
            <div class="flex justify-center mb-4">
              <img class="w-32 border rounded-xl group-hover:-translate-y-2 group-hover:scale-110 group-hover:rotate-3 transition duration-300 shadow-lg shadow-black/10 hover:shadow-[0px_4px_10px_0px_rgba(0,0,0,0.2)] " src={{ $book->cover }} alt="book-img">
            </div>
          
            <div class="flex flex-col">
              <p class="inline-block mr-auto mb-2 text-xs text-[#3CD755] font-semibold bg-[#DCFCE7] py-2 px-2 rounded-md">{{ $book->status }}</p>
              <p class="text-sm truncate mb-1 font-semibold text-[#777A8F]">{{ $book->title }}</p>
              <p class="text-xs text-[#777A8F]">{{ $book->author }}</p>
            </div>
          </a>
        @endforeach

        {{-- <a href="/books/show" class="group bg-white/60 pb-4 w-60 px-4 py-4 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] hover:shadow-[0px_11px_50px_0px_rgba(198,203,232,0.35)] hover:scale-105 transition-all duration-300">
          <div class="flex justify-center mb-4">
            <img class="w-32 rounded-xl group-hover:-translate-y-2 group-hover:scale-110 group-hover:rotate-3 transition duration-300 shadow-lg shadow-black/10" src="/img/book-img.png" alt="book-img">
          </div>
        
          <div class="flex flex-col ">
            <p class="inline-block mr-auto mb-2 text-xs text-[#3CD755] font-semibold bg-[#DCFCE7] py-2 px-2 rounded-md">In Stock</p>
            <p class="text-sm truncate mb-1 font-semibold text-[#777A8F]">Algoritma dan Pemrograman</p>
            <p class="text-xs text-[#777A8F]">Rinaldi Munir,Leony Lidya</p>
          </div>
        </a> --}}
        </div>
      </div>
    </div>
@endsection


