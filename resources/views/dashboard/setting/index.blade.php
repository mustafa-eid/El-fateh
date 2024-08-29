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
          <li class="breadcrumb-item active" aria-current="page">{{ $admin->first_name.' '.$admin->last_name }}</li>
        </ol>
      </div>
    </div>
    <div >
        <div >
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Update Admin') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.update',$admin->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="first_name">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name',$admin->first_name) }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$admin->last_name) }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$admin->email) }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',$admin->phone) }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if ($admin->type == 'superAdmin')
                            <div class="form-group mb-4">
                                <label for="type">{{ __('Type') }}</label>
                                <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required autocomplete="type">
                                    <option value="admin" {{ old('type',$admin->type) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="superAdmin" {{ old('type',$admin->type) == 'superAdmin' ? 'selected' : '' }}>Super Admin</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="status">{{ __('Status') }}</label>
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status">
                                    <option value="active" {{ old('status',$admin->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="not_active" {{ old('status',$admin->status) == 'not_active' ? 'selected' : '' }}>Not Active</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @endif

    
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Admin') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  </div>
</div>

@endsection

