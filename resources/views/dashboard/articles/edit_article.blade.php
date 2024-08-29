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
          <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
        </ol>
      </div>
    </div>
    <form method="POST" action="{{ route('update_article', $article->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="en_title" class="form-label">Title (English)</label>
        <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $article->en_title }}">
        @error('en_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_title" class="form-label">Title (Arabic)</label>
        <input type="text" class="form-control" id="ar_title" name="ar_title" value="{{ $article->ar_title }}">
        @error('ar_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="en_content" class="form-label">Content (English)</label>
        <textarea class="form-control" id="en_content" name="en_content" rows="3">{{ $article->en_content }}</textarea>
        @error('en_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_content" class="form-label">Content (Arabic)</label>
        <textarea class="form-control" id="ar_content" name="ar_content" rows="3">{{ $article->ar_content }}</textarea>
        @error('ar_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-row">
        <div class="col-12">
          <label for="image">Update image</label>
        </div>
        <div class="form-group mb-4">
          @if ($article->image)
          <input type="file" name="image" id="image" class="form-control">
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="card-body">
            <img src="{{ asset('dist/img/articles/' . $article->image) }}" alt="Article Image"  style="max-width: 100px;max-height:100px">
            {{-- <div class="card-body">
              <h5 class="card-title">Article Image</h5>
            </div> --}}
          </div>
          @endif
        </div>
        <div class="form-group mb-4">
          <label for="pdf">{{ __('Article PDF') }}</label>
          @if ($article->pdf)
          <div class="mb-3">
              <a href="{{ asset('dist/img/articles/'.$article->pdf) }}" target="_blank"
                  class="btn btn-info">View PDF</a>
              {{-- <a href="{{ asset("storage/$category->pdf") }}" download class="btn btn-secondary">Download PDF</a> --}}
          </div>
      @endif
          <div class="card">
              {{-- <div class="card-body "> --}}
                <input type="file" class="form-control-file @error('pdf') is-invalid @enderror" id="pdf" name="pdf" accept="application/pdf">
                @error('pdf')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              {{-- </div> --}}
          </div>
      </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</div>
<br>
<br>
<br>
@endsection