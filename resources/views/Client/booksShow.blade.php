@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full">
        <div class="bg-white/60 flex space-x-12 w-full px-14 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
          <div class="flex justify-center items-start mb-4">
            <img class="w-72 rounded-xl shadow-lg shadow-black/10" src="/img/book-img.png" alt="book-img">
          </div>
        
          <div class=" flex-1 flex flex-col items-start justify-between pb-4">
            <div>
              <p class="inline-block mr-auto mb-3 text-xs text-[#3CD755] font-semibold bg-[#DCFCE7] py-2 px-2 rounded-md">In Stock</p>
              <p class="text-lg truncate mb-2 font-semibold text-[#777A8F]">Algoritma dan Pemrograman</p>
              <p class="text-base mb-4 font-medium text-[#777A8F]/80">Rinaldi Munir,Leony Lidya</p>
              <div class="space-x-2 mb-8">
                <p class="inline-block py-2 px-4 rounded-md bg-[#777A8F]/10 text-[#777A8F] text-xs font-medium">Programming</p>
                <p class="inline-block py-2 px-4 rounded-md bg-[#777A8F]/10 text-[#777A8F] text-xs font-medium">Algoritm</p>
                <p class="inline-block py-2 px-4 rounded-md bg-[#777A8F]/10 text-[#777A8F] text-xs font-medium">Code</p>
              </div>
              
              <p class="w-[90%] text-ellipsis overflow-hidden  text-sm text-[#777A8F] ">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia explicabo fugiat ullam exercitationem nostrum, illum neque dolorem quia ut odit sunt debitis dolore qui totam inventore porro. Officiis ex repellendus qui unde sunt adipisci delectus cumque eum modi aperiam ipsa, velit neque veniam ad voluptates aspernatur possimus accusamus voluptatem, excepturi eos necessitatibus distinctio. Obcaecati, nisi minima! Atque deserunt aliquam sequi assumenda ad eaque distinctio illo soluta, sapiente autem reprehenderit dicta pariatur quisquam at possimus vero accusantium nesciunt qui praesentium necessitatibus incidunt nobis velit alias. Delectus sint exercitationem pariatur voluptas similique.
              </p>
            </div>
            <a class="text-white text-sm py-2.5 font-medium px-12 bg-[#FF3737] hover:opacity-80 transition-all duration-150 rounded-xl" href="#">
              Request For Rent
            </a>
  
          </div>
        </div>
    </div>
@endsection