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
        
        <div class="flex items-center justify-between mb-12">
          <h1 class="text-[#151C48] font-semibold text-xl">Book List</h1>
          <div class="space-x-4 flex">
            <a href="/admin/books/trash" class="px-8 py-2 bg-[#FFE8E8] hover:-translate-y-0.5 hover:opacity-75 hover:shadow-[0px_6px_10px_0px_rgba(255,55,55,0.2)] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.12)] transition-all  border border-[#FF5050] text-[#FF5050] rounded-xl text-xs font-semibold" href="#">Trash</a>
            <a href="/admin/books/add" class="px-8 py-2 bg-[#DCFBE7] hover:-translate-y-0.5 hover:opacity-75 hover:shadow-[0px_6px_10px_0px_rgba(60,215,85,0.2)]  shadow-[0px_4px_4px_0px_rgba(60,215,85,0.12)] transition-all border border-[#3CD755] text-[rgb(60,215,85)] rounded-xl text-xs font-semibold" href="#">Add Book</a>
          </div>
        </div>

        <table class="table-fixed w-full border-collapse ">
          <thead>
            <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 ">
              <th class="text-start font-semibold py-4 w-[5%]">No</th>
              <th class="text-start font-semibold py-4 w-[35%]">Title</th>
              <th class="text-start font-semibold py-4 w-[35%]">Category</th>
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
                <td class="py-4 text-[#3CD755] font-medium text-sm">{{ $book->status }}</td>
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


