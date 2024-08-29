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
          {{-- <li class="breadcrumb-item active" aria-current="page">All Categories</li> --}}
        </ol>
      </div>
    </div>
    <div>
        <div>
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Add Category') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('article-categories.store') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group mb-4">
                                <label for="ar_name">{{ __('Category Name (Arabic)') }}</label>
                                <textarea id="ar_name" class="form-control @error('ar_name') is-invalid @enderror" name="ar_name"  autocomplete="ar_name" autofocus>{{ old('ar_name') }}</textarea>
    
                                @error('ar_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="en_name">{{ __('Category Name (English)') }}</label>
                                <textarea id="en_name" class="form-control @error('en_name') is-invalid @enderror" name="en_name"  autocomplete="en_name">{{ old('en_name') }}</textarea>
    
                                @error('en_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="en_content">{{ __('Category Content (English)') }}</label>
                                <textarea id="en_content" class="form-control @error('en_content') is-invalid @enderror" name="en_content">{{ old('en_content') }}</textarea>
    
                                @error('en_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_content">{{ __('Category Content (Arabic)') }}</label>
                                <textarea id="ar_content" class="form-control @error('ar_content') is-invalid @enderror" name="ar_content">{{ old('ar_content') }}</textarea>
    
                                @error('ar_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <div class="card">
                                    <label for="photo">{{ __('Category Photo') }}</label>
                                    <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*" required>
        
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Category') }}
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
@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#ar_name' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#en_name' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#en_content' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#ar_content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
