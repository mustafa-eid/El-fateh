@extends('layouts.admin.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">All Phone Numbers</li>
        </ol>
      </div>
    </div>
    <!-- Add New Phone Number Button -->
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('phone-numbers.create') }}" class="btn btn-success">Add New Phone Number</a>
      </div>
    </div>
    <!-- Table to display phone numbers -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Phone Numbers List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Branch name (English)</th>
                        <th>Branch name (Arabic)</th>
                        <th>Address (English)</th>
                        <th>Address (Arabic)</th>
                        <th>Phone Numbers</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                  <tr class="align-middle">
                    <td>Main Branch</td>
                    <td>الفرع الرئيسي</td>
                    <td>{{ $mainBranch->en_address }}</td>
                    <td>{{ $mainBranch->ar_address }}</td>
                    <td>
                        @foreach ($mainBranch->phoneNumbers as $number)
                        <li><span class="text-info">{{ $number->en_title}}: </span>{{$number->phone_number }}</li>
                        @endforeach
                    </td>
                </tr>
                    @forelse($branches as $branch)
                    <tr class="align-middle">
                        <td>{{ $branch->en_name }}</td>
                        <td>{{ $branch->ar_name }}</td>
                        <td>{{ $branch->en_address }}</td>
                        <td>{{ $branch->ar_address }}</td>
                        <td>
                            @foreach ($branch->phoneNumbers as $number)
                            <li><span class="text-info">{{ $number->en_title}}: </span>{{$number->phone_number }}</li>
                            @endforeach
                        </td>
                        {{-- <td>
                            <a href="{{ route('phone-numbers.edit', $phoneNumber->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('phone-numbers.destroy', $phoneNumber->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">There is no data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
