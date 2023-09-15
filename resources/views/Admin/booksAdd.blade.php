@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="w-full h-full flex flex-col space-y-6">
      <div class="bg-white/60 flex-1 space-y-4 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] p-6 md:p-10">
        {{-- Title --}}
        <div class="flex relative items-center justify-between mb-12">
          <a class="flex items-center rounded-lg space-x-2 py-2 pl-2 pr-4 absolute top-0 left-0 bg-[#FFE8E8] text-[#FF5050] font-semibold text-xs md:text-sm " href="/admin/books">
            <img class="w-3" src="/img/icon-chevron-back.svg" alt="">
            <p>Back</p></a>
          <h1 class="text-[#151C48] font-semibold text-center w-full text-lg md:text-2xl">Add Book</h1>
        </div> 
        {{-- Form --}}
        <div class="xl:px-10">
          <form  action="/admin/books/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex mb-8 flex-col space-y-6 md:space-y-0 md:divide-x-2 xl:px-10 md:flex-row">
              <div class="space-y-6 md:w-1/2 md:pr-8">
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Title</label>
                  <input class="p-2 focus:outline-[#777A8F]/80 text-[#777A8F]/90 text-sm  rounded-lg w-full border border-[#777A8F]/20" type="text" name="title" id="title">
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Author</label>
                  <input class="p-2 focus:outline-[#777A8F]/80 text-[#777A8F]/90 text-sm  rounded-lg w-full border border-[#777A8F]/20" type="text" name="author" id="author">
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Category</label>
                  <select class="js-example-basic-multiple p-2 focus:outline-[#777A8F]/80 text-[#777A8F]/90 text-sm  outline-red-600 outline-4 w-full" name="categories[]" multiple="multiple">
                    @foreach ($categories as $category)
                      <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <p class="text-[#777A8F] font-medium text-sm" for="title">Status</p>
                  <div class="flex space-x-8">
                    <div class="flex items-center space-x-2">
                      <input class="border borde-[#777A8F] accent-[#777A8F]" type="radio" id="in_stock" name="status" value="In stock">
                      <label class="text-sm text-[#777A8F]" for="in_stock">In Stock</label><br>
                    </div>
                    <div class="flex items-center space-x-2">
                      <input class="border borde-[#777A8F] accent-[#777A8F]" type="radio" id="out_of_stock" name="status" value="Out Of Stock">
                      <label class="text-sm text-[#777A8F]" for="out_of_stock">Out Of Stock</label><br>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="cover">Cover</label>
                  <input name="cover" type="file" class="block w-full transition-all duration-300 text-sm text-slate-500 border rounded-lg
                    file:mr-4 file:py-2 file:px-4
                    file:border-0
                    file:text-sm file:font-medium
                    file:bg-[#777A8F]/10 file:text-[#777A8F]/60
                    hover:file:bg-[#777A8F]/20 
                  "/>
                </div>
              </div>
              <div class="md:w-1/2 md:pl-8">
                <div class="flex flex-col space-y-2 items-start h-full">
                  <label class="text-[#777A8F] font-medium text-sm" for="description">Description</label>
                  <textarea class="resize-none leading-6 font-normal w-full px-4 py-2 text-sm text-[#777A8F] rounded-lg  border border-[#777A8F]/20 focus:outline-[#777A8F]/50 h-72 md:h-full" name="description"></textarea>
                  {{-- <textarea  type="text" name="title" id="title"> --}}
                </div>
              </div>
  
            </div>
            <button type="submit" class="block mx-auto px-24 shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] hover:shadow-[0px_6px_6px_0px_rgba(255,55,55,0.3)] hover:opacity-80 hover:-translate-y-1 transition-all duration-300 py-2.5 rounded-xl bg-[#FF3737] text-white font-medium text-sm w-full md:w-auto">Add Book</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
      </script>
@endsection


