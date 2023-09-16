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
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex justify-between text-[#777A8F] focus:outline-[#777A8F] w-40 after:hidden bg-white/10 border border-white/40 hover:bg-white/20 font-medium rounded-xl text-xs px-5 py-2.5 text-start items-center shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] md:text-sm md:w-48" type="button"> <p>{{ $selected_category == null ? 'Select Category' : $selected_category }}</p> <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-[0px_7px_61px_0px_rgba(198,203,232,0.5)] w-40 -translate-y-20 md:mt-0 md:w-44">
            <ul class="py-2 text-xs text-[#777A8F] md:text-sm" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="/admin/books/?category=all" class="block px-4 py-2 hover:bg-[#777A8F]/10">All</a>
              </li>
              @foreach ($categories as $category)
                {{-- <option {{ $selected_category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option> --}}
                <li>
                  <a href="/admin/books?category={{ $category->id }}" class="block px-4 py-2 hover:bg-[#777A8F]/10">{{ $category->name }}</a>
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

      <div class="bg-white/60 flex flex-col justify-between flex-1 w-full rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]  p-6 xl:p-10 xl:pb-4 ">
        
        <div class="space-y-4">
          <div class="flex items-center justify-between mb-12">
            <h1 class="text-[#151C48] font-semibold text-lg md:text-xl">Book List</h1>
            <div class="flex space-x-2 md:space-x-4">
              <a href="/admin/books/trash" class="bg-[#FFE8E8] hover:-translate-y-0.5 hover:opacity-75 hover:shadow-[0px_6px_10px_0px_rgba(255,55,55,0.2)] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.12)] transition-all  border border-[#FF5050] text-[#FF5050] rounded-xl  font-semibold  px-3 py-2 text-[10px] md:text-xs md:px-8 md:py-2" href="#">Trash</a>
              <a href="/admin/books/add" class="bg-[#DCFBE7] hover:-translate-y-0.5 hover:opacity-75 hover:shadow-[0px_6px_10px_0px_rgba(60,215,85,0.2)]  shadow-[0px_4px_4px_0px_rgba(60,215,85,0.12)] transition-all border border-[#3CD755] text-[rgb(60,215,85)] rounded-xl  font-semibold  px-3 py-2 text-[10px] md:text-xs md:px-8 md:py-2" href="#">Add Book</a>
            </div>
          </div>
  
          <div class="w-full overflow-scroll">
            <table class="mx-auto table-fixed border-collapse w-[60rem] xl:w-full">
              <thead>
                <tr class="text-[#777A8F] border-b border-[#777A8F]/20 text-xs md:text-sm">
                  <th class="text-start font-semibold py-4 w-[5%]">No</th>
                  <th class="text-start font-semibold py-4 w-[35%]">Title</th>
                  <th class="text-start font-semibold py-4 w-[35%]">Category</th>
                  <th class="text-start font-semibold py-4 w-[15%]">Status</th>
                  <th class="text-start font-semibold py-4">Action</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($books as $index => $book)     
                  <tr class="text-[#777A8F] border-b border-[#777A8F]/20 py-8 text-xs md:text-sm">
                    <td class="py-4 pl-2">{{ $books->firstItem() + $index }}</td>
                    <td class="py-4">{{ $book->title }}</td>
                    <td class="py-4 flex items-center space-x-2">
                      @foreach ($book->categories as $category)
                          <p class="inline-block text-xs font-medium px-2 py-2 rounded-md bg-[#777A8F]/10">{{ $category->name }}</p>
                      @endforeach
                    </td>
                    <td class="py-4 text-[#3CD755] font-medium text-xs md:text-sm">{{ $book->status }}</td>
                    <td class="py-4 flex space-x-2">
                      <a href="/admin/books/edit/{{ $book->id }}" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#E8F8FF] text-[#41B6FF]">Edit</a>
                      <form class="rent-request-form-trash" action="/admin/books/trash/{{ $book->id }}" method="post">
                        @csrf
                        <button class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050] rounded-sm" type="submit">Trash</button>
                      </form>
                      {{-- <a href="#" class="inline-block hover:opacity-70 transition-all duration-300 text-xs px-2 py-2 font-medium bg-[#FFE8E8] text-[#FF5050]">Trash</a> --}}
                    </td>
                  </tr>
                @endforeach
          
              </tbody>
            </table>
          </div>
        </div>
      

        {{-- paginator --}}
        <div class="mt-10">
          {{ $books->links() }}
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      const formTrash = document.querySelectorAll(".rent-request-form-trash")

      formTrash.forEach(form => {
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          
          Swal.fire({
          title: 'Warning',
          text: "Are you sure want to move this book to trash?",
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


