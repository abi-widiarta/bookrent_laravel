@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
      <div class="bg-white/60 flex-1 space-y-4 w-full px-10 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
        {{-- Title --}}
        <div class="flex relative items-center justify-between mb-12">
          <a class="flex items-center rounded-lg space-x-2 py-2 pl-2 pr-4 absolute top-0 left-0 bg-[#FFE8E8] text-[#FF5050] text-sm font-semibold" href="/admin/books">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.7731 0.25116C13.8451 0.330666 13.9021 0.42509 13.941 0.52903C13.98 0.632969 14 0.744386 14 0.856905C14 0.969425 13.98 1.08084 13.941 1.18478C13.9021 1.28872 13.8451 1.38314 13.7731 1.46265L7.86928 8.00013L13.7731 14.5376C13.845 14.6171 13.902 14.7116 13.9409 14.8155C13.9798 14.9195 13.9998 15.0308 13.9998 15.1433C13.9998 15.2558 13.9798 15.3672 13.9409 15.4712C13.902 15.5751 13.845 15.6695 13.7731 15.7491C13.7013 15.8286 13.616 15.8917 13.5221 15.9348C13.4282 15.9778 13.3276 16 13.226 16C13.1244 16 13.0238 15.9778 12.9299 15.9348C12.836 15.8917 12.7507 15.8286 12.6789 15.7491L6.22686 8.60587C6.15494 8.52636 6.09789 8.43194 6.05896 8.328C6.02004 8.22406 6 8.11265 6 8.00013C6 7.88761 6.02004 7.77619 6.05896 7.67225C6.09789 7.56831 6.15494 7.47389 6.22686 7.39438L12.6789 0.25116C12.7507 0.171539 12.836 0.108375 12.9299 0.0652784C13.0237 0.0221819 13.1244 1.43714e-07 13.226 1.43714e-07C13.3276 1.43714e-07 13.4283 0.0221819 13.5222 0.0652784C13.616 0.108375 13.7013 0.171539 13.7731 0.25116Z" fill="#FF5050"/>
              </svg>
            <p>Back</p></a>
          <h1 class="text-[#151C48] font-semibold text-2xl text-center  w-full">Add Book</h1>
        </div> 
        {{-- Form --}}
        <div class="px-10">
          <form  action="#" method="post">
            @csrf
            <div class="flex divide-x-2 px-10 mb-8">
              <div class="w-1/2 pr-8 space-y-6 ">
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Title</label>
                  <input class="p-2 focus:outline-[#777A8F]/80 text-[#777A8F]/90 text-sm  rounded-lg w-full border border-[#777A8F]/20" type="text" name="title" id="title">
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Author</label>
                  <input class="p-2 focus:outline-[#777A8F]/80 text-[#777A8F]/90 text-sm  rounded-lg w-full border border-[#777A8F]/20" type="text" name="title" id="title">
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Category</label>
                  <input class="p-2 focus:outline-[#777A8F]/80 text-[#777A8F]/90 text-sm  rounded-lg w-full border border-[#777A8F]/20" type="text" name="title" id="title">
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <p class="text-[#777A8F] font-medium text-sm" for="title">Status</p>
                  <div class="flex space-x-8">
                    <div class="flex items-center space-x-2">
                      <input class="border borde-[#777A8F] accent-[#777A8F]" type="radio" id="in_stock" name="fav_language" value="in_stock">
                      <label class="text-sm text-[#777A8F]" for="in_stock">In Stock</label><br>
                    </div>
                    <div class="flex items-center space-x-2">
                      <input class="border borde-[#777A8F] accent-[#777A8F]" type="radio" id="out_of_stock" name="fav_language" value="out_of_stock">
                      <label class="text-sm text-[#777A8F]" for="out_of_stock">Out Of Stock</label><br>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col space-y-2 items-start">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Cover</label>
                  <input type="file" class="block w-full transition-all duration-300 text-sm text-slate-500 border rounded-lg
                    file:mr-4 file:py-2 file:px-4
                     file:border-0
                    file:text-sm file:font-medium
                    file:bg-[#777A8F]/10 file:text-[#777A8F]/60
                    hover:file:bg-[#777A8F]/20 
                  "/>
                </div>
              </div>
              <div class="w-1/2 pl-8">
                <div class="flex flex-col space-y-2 items-start h-full">
                  <label class="text-[#777A8F] font-medium text-sm" for="title">Description</label>
                  <textarea class="resize-none w-full h-full p-1 rounded-lg  border border-[#777A8F]/20 focus:outline-[#777A8F]/50" name="description"></textarea>
                  {{-- <textarea  type="text" name="title" id="title"> --}}
                </div>
              </div>
  
            </div>
            <button type="submit" class=" block mx-auto px-24 shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] hover:shadow-[0px_6px_6px_0px_rgba(255,55,55,0.3)] hover:opacity-80 hover:-translate-y-1 transition-all duration-300 origin-left py-2.5 rounded-xl bg-[#FF3737] text-white font-medium text-sm">Add Book</button>
          </form>
        </div>
      </div>
    </div>
@endsection


