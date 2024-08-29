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
          <li class="breadcrumb-item active" aria-current="page">All Requests</li>
        </ol>
      </div>
    </div>

    <!-- Search Form -->
    <div class="row mb-3">
      <div class="col">
        <form action="{{ route('contactRequest.index') }}" method="GET" class="form-inline">
          <div class="form-group">
            <label for="searchPeriod" class="mr-2">Search Period:</label>
            <select name="period" id="searchPeriod" class="form-control">
              <option value="all" {{ request('period') == 'all' ? 'selected' : '' }}>All time</option>
              <option value="daily" {{ request('period') == 'daily' ? 'selected' : '' }}>Daily</option>
              <option value="weekly" {{ request('period') == 'weekly' ? 'selected' : '' }}>Weekly</option>
              <option value="monthly" {{ request('period') == 'monthly' ? 'selected' : '' }}>Monthly</option>
            </select>
            <button type="submit" class="btn btn-primary ml-2">Search</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Table to display requests -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Requests List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>City</th>
                        <th>Request Type</th>
                        <th>Service Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $request)
                    <tr class="align-middle">
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->phone_number }}</td>
                        <td>{{ $request->city }}</td>
                        <td>{{ $request->requestType->en_name ?? 'N/A' }}</td>
                        <td>{{ $request->requestService->en_name ?? 'N/A' }}</td>
                        <td>{{ Str::limit($request->description, 255) }}</td>
                        <td>{{ $request->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewRequestModal{{ $request->id }}">
                                View
                            </button>
                            <form action="{{ route('contactRequest.destroy',$request->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="viewRequestModal{{ $request->id }}" tabindex="-1" aria-labelledby="viewRequestModalLabel{{ $request->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="viewRequestModalLabel{{ $request->id }}">Request Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p><strong>Name:</strong> {{ $request->name }}</p>
                            <p><strong>Phone Number:</strong> {{ $request->phone_number }}</p>
                            <p><strong>City:</strong> {{ $request->city }}</p>
                            <p><strong>Request Type:</strong> {{ $request->requestType->en_name ?? 'N/A' }}</p>
                            <p><strong>Service Type:</strong> {{ $request->requestService->en_name ?? 'N/A' }}</p>
                            <p><strong>Description:</strong></p>
                            <p>{{ $request->description }}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">There is no data available.</td>
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
