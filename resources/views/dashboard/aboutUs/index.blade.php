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
          <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
      </div>
    </div>
    <!-- Display About Us Data -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            About Us
          </div>
          <div class="card-body">
            <form method="POST" action="{{ isset($aboutUs) ? route('about-us.update', $aboutUs->id) : route('about-us.store') }}" enctype="multipart/form-data">
              @csrf
              @isset($aboutUs)
                @method('PUT')
              @endisset
              <div class="mb-3">
                <label for="ar_company_name" class="form-label">Company Name (Arabic)</label>
                <input type="text" class="form-control @error('ar_company_name') is-invalid @enderror" id="ar_company_name" name="ar_company_name" value="{{ old('ar_company_name', $aboutUs->ar_company_name ?? '') }}">
                @error('ar_company_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="en_company_name" class="form-label">Company Name (English)</label>
                <input type="text" class="form-control @error('en_company_name') is-invalid @enderror" id="en_company_name" name="en_company_name" value="{{ old('en_company_name', $aboutUs->en_company_name ?? '') }}">
                @error('en_company_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="ar_about_text" class="form-label">About Text (Arabic)</label>
                <textarea class="form-control @error('ar_about_text') is-invalid @enderror" id="ar_about_text" name="ar_about_text">{{ old('ar_about_text', $aboutUs->ar_about_text ?? '') }}</textarea>
                @error('ar_about_text')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="en_about_text" class="form-label">About Text (English)</label>
                <textarea class="form-control @error('en_about_text') is-invalid @enderror" id="en_about_text" name="en_about_text">{{ old('en_about_text', $aboutUs->en_about_text ?? '') }}</textarea>
                @error('en_about_text')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="founded_date" class="form-label">Founded Date</label>
                <input type="date" class="form-control @error('founded_date') is-invalid @enderror" id="founded_date" name="founded_date" value="{{ old('founded_date', $aboutUs->founded_date ?? '') }}">
                @error('founded_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $aboutUs->email ?? '') }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="logo" class="form-label">Logo (optional)</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                @if(isset($aboutUs->logo))
                  <div class="mt-2">
                    <img src="{{ asset('storage/'.$aboutUs->logo) }}" alt="Current Logo" style="max-height: 100px;">
                  </div>
                @endif
                @error('logo')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ isset($aboutUs) ? 'Update About Us' : 'Add About Us' }}</button>
              </div>
            </form>
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
        .create( document.querySelector( '#ar_about_text' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#en_about_text' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection