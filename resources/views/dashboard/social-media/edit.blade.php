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
          <li class="breadcrumb-item active" aria-current="page">Edit Social Media</li>
        </ol>
      </div>
    </div>
    <div>
        <div>
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Edit Social Media') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('social-media.update', $socialMedia->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-4">
                                <label for="platform">{{ __('Platform') }}</label>
                                <select id="platform" class="form-control @error('platform') is-invalid @enderror" name="platform" required>
                                    <option value="facebook" {{ $socialMedia->platform == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="twitter" {{ $socialMedia->platform == 'twitter' ? 'selected' : '' }}>Twitter</option>
                                    <option value="instagram" {{ $socialMedia->platform == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="linkedIn" {{ $socialMedia->platform == 'linkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                    <option value="youTube" {{ $socialMedia->platform == 'youTube' ? 'selected' : '' }}>YouTube</option>
                                </select>
    
                                @error('platform')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="url">{{ __('URL') }}</label>
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url', $socialMedia->url) }}" required>
    
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Social Media') }}
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
