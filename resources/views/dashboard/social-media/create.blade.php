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
          {{-- <li class="breadcrumb-item active" aria-current="page">All Social Media</li> --}}
        </ol>
      </div>
    </div>
    <div>
        <div>
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Add Social Media') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('social-media.store') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group mb-4">
                                <label for="platform">{{ __('Platform') }}</label>
                                <select id="platform" class="form-control @error('platform') is-invalid @enderror" name="platform" required>
                                    <option value="facebook">Facebook</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="linkedIn">LinkedIn</option>
                                    <option value="youTube">YouTube</option>
                                </select>
    
                                @error('platform')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="url">{{ __('URL') }}</label>
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required>
    
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Social Media') }}
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
