@extends('layouts.dashboardLayout')

@section('title')
    Rent Log
@endsection

@section('page-title')
    Rent Log
@endsection

@section('content')
    <div class="w-full">
        <div class="bg-white/60 space-y-4  w-full px-10 py-10 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)]">
          <h1 class="text-[#151C48] font-semibold text-xl">Rent Log List</h1>

          <table class="table-fixed w-full border-collapse ">
            <thead>
              <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 ">
                <th class="text-start font-semibold py-4 w-[5%]">No</th>
                <th class="text-start font-semibold py-4 w-[30%]">Book</th>
                <th class="text-start font-semibold py-4 w-[15%]">Start Date</th>
                <th class="text-start font-semibold py-4 w-[15%]">Return Date</th>
                <th class="text-start font-semibold py-4 w-[20%]">Actual Return Date</th>
                <th class="text-start font-semibold py-4">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
                <td class="py-4 pl-2">1</td>
                <td class="py-4">Algoritma Pemrograman</td>
                <td class="py-4">2023-09-20</td>
                <td class="py-4">2023-09-23</td>
                <td class="py-4">2023-09-23</td>
                <td class="py-4">
                  <p class="inline-block text-xs px-4 py-2 font-medium bg-[#FFF4EF] text-[#FF8B4F]">Waiting Approval</p>
                </td>
              </tr>
              <tr class="text-[#777A8F] text-sm border-b border-[#777A8F]/20 py-8">
                <td class="py-4 pl-2">2</td>
                <td class="py-4">Algoritma Pemrograman</td>
                <td class="py-4">2023-09-20</td>
                <td class="py-4">2023-09-23</td>
                <td class="py-4">2023-09-23</td>
                <td class="py-4">
                  <p class="inline-block text-xs px-4 py-2 font-medium bg-[#FFF4EF] text-[#FF8B4F]">Waiting Approval</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
@endsection