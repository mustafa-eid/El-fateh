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
          <li class="breadcrumb-item active" aria-current="page">{{ $category->en_name }}</li>
        </ol>
      </div>
    </div>
    <div >
        <div >
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Update Category') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="ar_name">{{ __('Category Name (Arabic)') }}</label>
                                <input id="ar_name" type="text" class="form-control @error('ar_name') is-invalid @enderror" name="ar_name" value="{{ old('ar_name',$category->ar_name) }}" required autocomplete="ar_name" autofocus>
                                @error('ar_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="form-group mb-4">
                                <label for="en_name">{{ __('Category Name (English)') }}</label>
                                <input id="en_name" type="text" class="form-control @error('en_name') is-invalid @enderror" name="en_name" value="{{ old('en_name',$category->en_name) }}" required autocomplete="en_name">
    
                                @error('en_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="en_content">{{ __('Category Content (English)') }}</label>
                                <textarea id="en_content" class="form-control @error('en_content') is-invalid @enderror" name="en_content" required>{{ old('en_content', $category->en_content) }}</textarea>
    
                                @error('en_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_content">{{ __('Category Content (Arabic)') }}</label>
                                <textarea id="ar_content" class="form-control @error('ar_content') is-invalid @enderror" name="ar_content" required>{{ old('ar_content', $category->ar_content) }}</textarea>
    
                                @error('ar_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="photo">{{ __('Category Photo') }}</label>
                                <div class="d-flex align-items-center">
                                    <div style="max-width: 100px; overflow: hidden;">
                                        <img src="{{ asset("storage/$category->photo") }}" alt="Category Photo" style="width: 100%; height: auto;">
                                    </div>
                                    <input type="file" class="form-control-file ml-3 @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                                </div>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Category') }}
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
