@extends('layouts.dashboardLayout')

@section('title')
    Books
@endsection

@section('page-title')
    Books
@endsection

@section('content')
    <div class="w-full h-full flex flex-col space-y-6">
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

      <div class="bg-white/60 flex-1 space-y-4 w-full px-10 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
        <div class="flex relative items-center justify-between mb-12">
          <a class="flex items-center rounded-lg space-x-2 py-2 pl-2 pr-4 absolute top-0 left-0 bg-[#FFE8E8] text-[#FF5050] text-sm font-semibold" href="/admin/books">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.7731 0.25116C13.8451 0.330666 13.9021 0.42509 13.941 0.52903C13.98 0.632969 14 0.744386 14 0.856905C14 0.969425 13.98 1.08084 13.941 1.18478C13.9021 1.28872 13.8451 1.38314 13.7731 1.46265L7.86928 8.00013L13.7731 14.5376C13.845 14.6171 13.902 14.7116 13.9409 14.8155C13.9798 14.9195 13.9998 15.0308 13.9998 15.1433C13.9998 15.2558 13.9798 15.3672 13.9409 15.4712C13.902 15.5751 13.845 15.6695 13.7731 15.7491C13.7013 15.8286 13.616 15.8917 13.5221 15.9348C13.4282 15.9778 13.3276 16 13.226 16C13.1244 16 13.0238 15.9778 12.9299 15.9348C12.836 15.8917 12.7507 15.8286 12.6789 15.7491L6.22686 8.60587C6.15494 8.52636 6.09789 8.43194 6.05896 8.328C6.02004 8.22406 6 8.11265 6 8.00013C6 7.88761 6.02004 7.77619 6.05896 7.67225C6.09789 7.56831 6.15494 7.47389 6.22686 7.39438L12.6789 0.25116C12.7507 0.171539 12.836 0.108375 12.9299 0.0652784C13.0237 0.0221819 13.1244 1.43714e-07 13.226 1.43714e-07C13.3276 1.43714e-07 13.4283 0.0221819 13.5222 0.0652784C13.616 0.108375 13.7013 0.171539 13.7731 0.25116Z" fill="#FF5050"/>
              </svg>
            <p>Back</p></a>
          <h1 class="text-[#151C48] font-semibold text-2xl text-center  w-full">Trash</h1>
        </div> 

        <table class="table-fixed w-full border-collapse ">
          <thead>
            <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 ">
              <th class="text-start font-semibold py-4 w-[5%]">No</th>
              <th class="text-start font-semibold py-4 w-[35%]">Title</th>
              <th class="text-start font-semibold py-4 w-[30%]">Category</th>
              <th class="text-start font-semibold py-4 w-[15%]">Status</th>
              <th class="text-start font-semibold py-4">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($books as $book)
              <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
                <td class="py-4 pl-2">{{ $loop->iteration }}</td>
                <td class="py-4">{{ $book->title }}</td>
                <td class="py-4 flex items-center space-x-2">
                  @foreach ($book->categories as $category)
                    <p class="inline-block text-xs font-medium px-2 py-2 rounded-md bg-[#777A8F]/10">{{ $category->name }}</p>
                  @endforeach                
                </td>
                <td class="py-4 text-[#FF8B4F] font-medium text-sm">{{ $book->status }}</td>
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
@endsection


