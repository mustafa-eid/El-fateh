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
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('media-files.index') }}">Media Files</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Media File</li>
        </ol>
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Media File') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('media-files.update', $mediaFile->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="home_video" class="form-label">{{ __('Home Video') }}</label><br>
                            @if ($mediaFile->home_video)
                            <video width="320" height="240" controls>
                                <source src="{{ asset("storage/$mediaFile->home_video") }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @else
                            <p>No home video available</p>
                            @endif
                            <input type="file" class="form-control @error('home_video') is-invalid @enderror" id="home_video" name="home_video" accept="video/*">
                            @error('home_video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="about_video" class="form-label">{{ __('About Video') }}</label><br>
                            @if ($mediaFile->about_video)
                            <video width="320" height="240" controls>
                                <source src="{{ asset("storage/$mediaFile->about_video") }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @else
                            <p>No about video available</p>
                            @endif
                            <input type="file" class="form-control @error('about_video') is-invalid @enderror" id="about_video" name="about_video" accept="video/*">
                            @error('about_video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="article_sliders[]" class="form-label">{{ __('Article Sliders') }}</label><br>
                            @if ($mediaFile->article_sliders)
                                @foreach (json_decode($mediaFile->article_sliders) as $slider)
                                    <img src="{{ asset("storage/$slider") }}" alt="Article Slider" style="max-width: 100px;">
                                @endforeach
                            @else
                                <p>No article sliders available</p>
                            @endif
                            <input type="file" class="form-control @error('article_sliders[]') is-invalid @enderror" id="article_sliders[]" name="article_sliders[]" accept="image/*" multiple>
                            @error('article_sliders[]')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="qr_photo" class="form-label">{{ __('QR Photo') }}</label><br>
                            @if ($mediaFile->qr_photo)
                                <img src="{{ asset("storage/$mediaFile->qr_photo") }}" alt="QR Photo" style="max-width: 100px;">
                            @else
                                <p>No QR photo available</p>
                            @endif
                            <input type="file" class="form-control @error('qr_photo') is-invalid @enderror" id="qr_photo" name="qr_photo" accept="image/*">
                            @error('qr_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Update Media File') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
