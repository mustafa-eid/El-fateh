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
          <li class="breadcrumb-item active" aria-current="page">Edit Phone Number</li>
        </ol>
      </div>
    </div>
    <div>
        <div>
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Edit Phone Number') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('phone-numbers.update', $phoneNumber->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label for="en_title">{{ __('Title (English)') }}</label>
                                <input id="en_title" type="text" class="form-control @error('en_title') is-invalid @enderror" name="en_title" value="{{ old('en_title', $phoneNumber->en_title) }}" required autocomplete="en_title" autofocus>

                                @error('en_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_title">{{ __('Title (Arabic)') }}</label>
                                <input id="ar_title" type="text" class="form-control @error('ar_title') is-invalid @enderror" name="ar_title" value="{{ old('ar_title', $phoneNumber->ar_title) }}" required autocomplete="ar_title">

                                @error('ar_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="phone_number">{{ __('Phone Number') }}</label>
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $phoneNumber->phone_number) }}" required>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="branch_id">{{ __('Branch') }}</label>
                                <select id="branch_id" class="form-control @error('branch_id') is-invalid @enderror" name="branch_id">
                                    <option value=""disabled>{{ __('Select Branch') }}</option>
                                    <option value="0" @if(old('branch_id', $phoneNumber->contactUs_id) == $mainBranch->id) selected @endif>main branch</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" @if(old('branch_id', $phoneNumber->branch_id) == $branch->id) selected @endif>{{ $branch->en_name }}</option>
                                    @endforeach
                                </select>

                                @error('branch_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Phone Number') }}
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
