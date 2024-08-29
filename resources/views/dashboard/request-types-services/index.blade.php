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
          <li class="breadcrumb-item active" aria-current="page">All Request Types and Services</li>
        </ol>
      </div>
    </div>
    <!-- Add New Request Type Button -->
    <div class="row mb-3">
      <div class="col">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRequestTypeModal">Add New Request Type</button>
      </div>
    </div>
    <!-- Table to display request types -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Request Types List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Name (English)</th>
                        <th>Name (Arabic)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requestTypes as $requestType)
                    <tr class="align-middle">
                        <td>{{ $requestType->en_name }}</td>
                        <td>{{ $requestType->ar_name }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editRequestTypeModal{{ $requestType->id }}">Edit</button>
                            <form action="{{ route('request-types.destroy', $requestType->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @include('dashboard.request-types-services.edit-types', ['requestType' => $requestType])
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">There is no data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br>
    
    <!-- Add New Request Service Button -->
    <div class="row mb-3">
      <div class="col">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRequestServiceModal">Add New Service Type</button>
      </div>
    </div>
    <!-- Table to display request services -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
           Service Types List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Name (English)</th>
                        <th>Name (Arabic)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requestServices as $requestService)
                    <tr class="align-middle">
                        <td>{{ $requestService->en_name }}</td>
                        <td>{{ $requestService->ar_name }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editRequestServiceModal{{ $requestService->id }}">Edit</button>
                            <form action="{{ route('request-services.destroy', $requestService->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @include('dashboard.request-types-services.edit-services', ['requestService' => $requestService])
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">There is no data available.</td>
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
@include('dashboard.request-types-services.create-types')
@include('dashboard.request-types-services.create-services')
@endsection
