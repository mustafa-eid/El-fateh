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
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </div>
    </div>
    <!-- Display Contact Us Data -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Contact Us (Main branch)
          </div>
          <div class="card-body">
            <form method="POST" action="{{ isset($contactUs) ? route('contact-us.update', $contactUs->id) : route('contact-us.store') }}">
              @csrf
              @isset($contactUs)
                @method('PUT')
              @endisset
              {{-- <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $contactUs->phone_number ?? '' }}">
              </div> --}}
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $contactUs->email ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="en_address" class="form-label">ِAddress (English)</label>
                <textarea class="form-control" id="en_address" name="en_address">{{ $contactUs->en_address ?? '' }}</textarea>
              </div>
              <div class="mb-3">
                <label for="ar_address" class="form-label">ِAddress (Arabic)</label>
                <textarea class="form-control" id="ar_address" name="ar_address">{{ $contactUs->ar_address ?? '' }}</textarea>
              </div>
              <div class="mb-3">
                <label for="en_terms_conditions" class="form-label">Terms & Conditions (English)</label>
                <textarea class="form-control" id="en_terms_conditions" name="en_terms_conditions">{{ $contactUs->en_terms_conditions ?? '' }}</textarea>
              </div>
              <div class="mb-3">
                <label for="ar_terms_conditions" class="form-label">Terms & Conditions (Arabic)</label>
                <textarea class="form-control" id="ar_terms_conditions" name="ar_terms_conditions">{{ $contactUs->ar_terms_conditions ?? '' }}</textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ isset($contactUs) ? 'Update Contact Us' : 'Add Contact Us' }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
