@extends('layouts.admin.app')

@section('content')
<!-- desplay success message -->
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
          <li class="breadcrumb-item active" aria-current="page">Add Articles</li>
        </ol>
      </div>
    </div>
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="article_category_id" class="form-label">Article Category</label>
        <select class="form-control" id="article_category_id" name="article_category_id">
          <option value="">Select Category</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('article_category_id') == $category->id ? 'selected' : '' }}>{!! strip_tags($category->en_name.'/'.$category->ar_name) !!}</option>
          @endforeach
        </select>
        @error('article_category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      @if ($errors->has('general'))
      <div class="alert alert-danger">{{ $errors->first('general') }}</div>
      @endif

      <div class="mb-3">
        <label for="en_title" class="form-label">Title (English)</label>
        <textarea class="form-control" id="en_title" name="en_title" rows="3">{{ old('en_title') }}</textarea>
        @error('en_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_title" class="form-label">Title (Arabic)</label>
        <textarea class="form-control" id="ar_title" name="ar_title" rows="3">{{ old('ar_title') }}</textarea>
        @error('ar_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="en_content" class="form-label">Content (English)</label>
        <textarea class="form-control" id="en_content" name="en_content" rows="3">{{ old('en_content') }}</textarea>
        @error('en_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_content" class="form-label">Content (Arabic)</label>
        <textarea class="form-control" id="ar_content" name="ar_content" rows="3">{{ old('ar_content') }}</textarea>
        @error('ar_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      @if ($errors->has('general'))
      <div class="alert alert-danger">{{ $errors->first('general') }}</div>
      @endif
      <div class="mb-3">
        <label for="link" class="form-label">Link</label>
        <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
        @error('link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group mb-4">
        <label for="image">Img</label>
        <div class="card">
          <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*"> 
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group mb-4">
        <label for="pdf">{{ __('Article PDF') }}</label>
        <div class="card">
            <input type="file" class="form-control-file @error('pdf') is-invalid @enderror" id="pdf" name="pdf" accept="application/pdf">
            @error('pdf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#en_title' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#ar_title' ) )
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