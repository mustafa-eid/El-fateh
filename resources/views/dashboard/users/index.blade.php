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
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('All Users') }}</li>
        </ol>
      </div>
    </div>

    <!-- Table to display users -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            {{ __('Users List') }}
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>{{ __('FIRST NAME') }}</th>
                        <th>{{ __('LAST NAME') }}</th>
                        <th>{{ __('EMAIL') }}</th>
                        <th>{{ __('PHONE') }}</th>
                        <th>{{ __('GENDER') }}</th>
                        <th>{{ __('ACTIONS') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="align-middle">
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>
                            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">{{ __('Edit') }}</a> --}}
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">{{ __('There is no data available.') }}</td>
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
