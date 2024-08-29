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
          <li class="breadcrumb-item active" aria-current="page">All Previous Works</li>
        </ol>
      </div>
    </div>
    <div >
        <div >
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Edit Previous Work') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('previousWorks.update', $previousWork->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label for="category_id">{{ __('Category') }}</label>
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                    <!-- Populate options from database -->
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $previousWork->category_id == $category->id ? 'selected' : '' }}>{{ strip_tags($category->en_name.'/'.$category->ar_name) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="en_title">{{ __('Title (English)') }}</label>
                                <textarea id="en_title" class="form-control @error('en_title') is-invalid @enderror" name="en_title" >{{ $previousWork->en_title }}</textarea>
    
                                @error('en_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_title">{{ __('Title (Arabic)') }}</label>
                                <textarea id="ar_title" class="form-control @error('ar_title') is-invalid @enderror" name="ar_title" >{{ $previousWork->ar_title }}</textarea>
    
                                @error('ar_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-4">
                                <label for="en_description">{{ __('Description (English)') }}</label>
                                <textarea id="en_description" class="form-control @error('en_description') is-invalid @enderror" name="en_description" >{{ $previousWork->en_description }}</textarea>
                                @error('en_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_description">{{ __('Description (Arabic)') }}</label>
                                <textarea id="ar_description" class="form-control @error('ar_description') is-invalid @enderror" name="ar_description" >{{ $previousWork->ar_description }}</textarea>
                                @error('ar_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="en_engineer_name">{{ __('Engineer Name (English)') }}</label>
                                <input id="en_engineer_name" type="text" class="form-control @error('en_engineer_name') is-invalid @enderror" name="en_engineer_name" value="{{ $previousWork->en_engineer_name }}" required autocomplete="en_engineer_name" autofocus>
    
                                @error('en_engineer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_engineer_name">{{ __('Engineer Name (Arabic)') }}</label>
                                <input id="ar_engineer_name" type="text" class="form-control @error('ar_engineer_name') is-invalid @enderror" name="ar_engineer_name" value="{{ $previousWork->ar_engineer_name }}" required autocomplete="ar_engineer_name">
    
                                @error('ar_engineer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="started_at">Started At</label>
                                <input id="started_at" type="date" class="form-control @error('started_at') is-invalid @enderror" name="started_at" value="{{ $previousWork->started_at }}" required>
    
                                @error('started_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ended_at">Ended At</label>
                                <input id="ended_at" type="date" class="form-control @error('ended_at') is-invalid @enderror" name="ended_at" value="{{ $previousWork->ended_at }}" required>
    
                                @error('ended_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="en_location">{{ __('Location (English)') }}</label>
                                <input id="en_location" type="text" class="form-control @error('en_location') is-invalid @enderror" name="en_location" value="{{ $previousWork->en_location }}" required autocomplete="en_location">
    
                                @error('en_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_location">{{ __('Location (Arabic)') }}</label>
                                <input id="ar_location" type="text" class="form-control @error('ar_location') is-invalid @enderror" name="ar_location" value="{{ $previousWork->ar_location }}" required autocomplete="ar_location">
    
                                @error('ar_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="en_client">{{ __('Client (English)') }}</label>
                                <input id="en_client" type="text" class="form-control @error('en_client') is-invalid @enderror" name="en_client" value="{{ $previousWork->en_client }}" autocomplete="en_client">
    
                                @error('en_client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_client">{{ __('Client (Arabic)') }}</label>
                                <input id="ar_client" type="text" class="form-control @error('ar_client') is-invalid @enderror" name="ar_client" value="{{ $previousWork->ar_client }}" autocomplete="ar_client">
    
                                @error('ar_client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="total_area">Total Area</label>
                                <input id="total_area" type="text" class="form-control @error('total_area') is-invalid @enderror" name="total_area" value="{{ $previousWork->total_area }}" autocomplete="total_area">
    
                                @error('total_area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="total_units">Total Units</label>
                                <input id="total_units" type="text" class="form-control @error('total_units') is-invalid @enderror" name="total_units" value="{{ $previousWork->total_units }}" autocomplete="total_units">
    
                                @error('total_units')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="total_concrete">Total Concrete</label>
                                <input id="total_concrete" type="text" class="form-control @error('total_concrete') is-invalid @enderror" name="total_concrete" value="{{ $previousWork->total_concrete }}" autocomplete="total_concrete">
    
                                @error('total_concrete')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group mb-4">
                                <label for="image">{{ __('Previous Work Photos') }}</label>
                                <div class="card">
                                    <div style="max-width: 100px; overflow: hidden;">
                                        @if (isset($previousWork->images))
                                        @php
                                            $images=json_decode($previousWork->images);
                                        @endphp
                                        @foreach ( $images as $item)
                                        <img src="{{ asset("storage/$item") }}"
                                        alt="Previous Work Photos" style="width: 20px; height: 20px;">
                                        @endforeach
                                        @endif   
                                        </div>
                                    <input type="file" class="form-control-file ml-3 @error('image') is-invalid @enderror" id="image" name="images[]" accept="image/*" multiple >
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="pdf">{{ __('Category PDF') }}</label>
                                <div class="card">
                                    <div class="card-body ">
                                        @if ($previousWork->pdf)
                                            <div class="mb-3">
                                                <a href="{{ asset("storage/$previousWork->pdf") }}" target="_blank"
                                                    class="btn btn-info">View PDF</a>
                                                {{-- <a href="{{ asset("storage/$category->pdf") }}" download class="btn btn-secondary">Download PDF</a> --}}
                                            </div>
                                        @endif
                                        <input type="file"
                                            class="form-control-file @error('pdf') is-invalid @enderror"
                                            id="pdf" name="pdf" accept="application/pdf">
                                        @error('pdf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Previous Work') }}
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
        .create( document.querySelector( '#ar_title' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#en_title' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#en_description' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#ar_description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection