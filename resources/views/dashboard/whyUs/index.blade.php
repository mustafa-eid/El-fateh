@extends('layouts.admin.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="page-toolbar px-3 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">All Reasons</li>
        </ol>
      </div>
    </div>
    <!-- Add New Reason Button -->
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('reasons.create') }}" class="btn btn-success">Add New Reason</a>
      </div>
    </div>
    <!-- Table to display reasons -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Reasons List
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Title (Arabic)</th>
                    <th>Title (English)</th>
                    <th>Content (Arabic)</th>
                    <th>Content (English)</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($reasons as $reason)
                  <tr class="align-middle">
                    <td>{!! Str::limit($reason->ar_title, 255, '...') !!}</td>
                    <td>{!! Str::limit($reason->en_title, 255, '...') !!}</td>
                    <td>{!! Str::limit($reason->ar_content, 255, '...') !!}</td>
                    <td>{!! Str::limit($reason->en_content, 255, '...') !!}</td>
                    <td>
                      <a href="{{ route('reasons.edit', $reason->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('reasons.destroy', $reason->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center">There is no data available.</td>
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
</div>
@endsection
