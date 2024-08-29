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
          <li class="breadcrumb-item active" aria-current="page">All Branches</li>
        </ol>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        @if ($branches->count()==0)
        <a href="{{ route('branches.create') }}" class="btn btn-success">Add Main Branch</a>
        @else
        <a href="{{ route('branches.create') }}" class="btn btn-success">Add New Branch</a>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Branches List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th>Name (English)</th>
                  <th>Name (Arabic)</th>
                  <th>Address (English)</th>
                  <th>Address (Arabic)</th>
                  <th>Phone Numbers</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($branches as $key => $branch)
                <tr class="align-middle">
                  <td>{!! Str::limit($branch->en_name, 255, '...') !!} {{ ($key == 0) ? '(Main branch)':''  }} </td>
                  <td>{!! Str::limit($branch->ar_name, 255, '...') !!} {{ ($key == 0) ? '(Main branch)':''  }}</td>
                  <td>{!! Str::limit($branch->en_address, 255, '...') !!}</td>
                  <td>{!! Str::limit($branch->ar_address, 255, '...') !!}</td>
                  <td>
                    @forelse($branch->phoneNumbers as $number)
                      <p>{{ $number->title }}: {{ $number->phone_number }}</p>
                    @empty
                      <p>No phone numbers available.</p>
                    @endforelse
                  </td>
                  <td>
                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">There are no branches available.</td>
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
