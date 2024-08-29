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
          <li class="breadcrumb-item active" aria-current="page">All Success Partners</li>
        </ol>
      </div>
    </div>
    <!-- Add New Success Partner Button -->
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('success-partners.create') }}" class="btn btn-success">Add New Success Partner</a>
      </div>
    </div>
    <!-- Table to display success partners -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Success Partners List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th>Name (Arabic)</th>
                  <th>Name (English)</th>
                  <th>Photo</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($successPartners as $partner)
                <tr class="align-middle">
                  <td>{!! Str::limit($partner->ar_name, 255, '...') !!}</td>
                  <td>{!! Str::limit($partner->en_name, 255, '...') !!}</td>
                  <td><img src="{{ asset("storage/$partner->photo") }}" alt="Partner Photo" style="max-width: 100px;"></td>
                  <td>
                    <a href="{{ route('success-partners.edit', $partner->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('success-partners.destroy', $partner->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">There is no data available.</td>
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
