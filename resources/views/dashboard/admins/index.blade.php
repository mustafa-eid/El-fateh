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
          <li class="breadcrumb-item active" aria-current="page">All admins</li>
        </ol>
      </div>
    </div>
    <!-- Add New Admin Button -->
    @if (Auth::guard('admin')->user()->type === 'superAdmin')
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('admins.create') }}" class="btn btn-success">Add new admin</a>
      </div>
    </div>
    @endif
    <!-- Table to display admins -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Admins List
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Status</th>
                    @if (Auth::guard('admin')->user()->type === 'superAdmin')
                    <th>Actions</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @forelse($admins as $admin)
                  <tr class="align-middle">
                    <td>{{ $admin->first_name }}</td>
                    <td>{{ $admin->last_name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td>{{ $admin->type == 'admin' ? 'admin' : 'super admin' }}</td>
                    <td class="text-{{ $admin->status == 'active' ? 'success' : 'danger' }}">{{ $admin->status == 'active' ? 'active' : 'not active' }}</td>
                    @if (Auth::guard('admin')->user()->type === 'superAdmin')
                    <td>
                      <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                    @endif
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center">There is no data available.</td>
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
