@extends('layouts.site.app')

@section('content')

    <div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
        <video autoplay controls muted loop style="width:100%">
            <source src="{{ asset("storage/" . (\App\Models\MediaFile::first()->home_video ?? '')) }}" type="video/mp4">
        </video>
    </div>

    {{-- Start Body --}}
    <style>
   #mbody1 {
        direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
        text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
        margin: 15px;
    }

    #mbody2 {
        direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
        margin: 15px;
    }
    /*  */
    </style>
    {{-- <div class="col-12">
        <div class="col-12 text-center">

            <h1 style="color: darkgoldenrod;" >{{ $aboutUs->{app()->getLocale() . '_company_name'} ??  __('El-Fateh') }}</h1>
        </div>
        <div class="col-12 text-center">
            <p style="color: darkgoldenrod;" >{{ $aboutUs->{app()->getLocale() . '_about_text'} ??  '' }}</p>
        </div>
        <br>
        @foreach ($categories as $category)
            <div class="col">
                <div class="row" id="mbody2">
                    <img src="{{ asset("storage/$category->photo") }}" class="card-img responsive-img"> <!-- Added responsive-img class here -->
                    <div class="col" id="mbody1">
                        <h1 style="margin-bottom: 15px;">{{ $category->{app()->getLocale() . '_name'} }}</h1>
                        <p style=" font-size:large;" style="margin-bottom: 15px;">
                            {{ $category->{app()->getLocale() . '_content'} }}</p>

                        <a href="{{ route('allPreviousWorks', $category->id) }}"
                            class="btn btn-warning">{{ __('Take a look') }}</a>

                            @if($category->pdf)
                                <a href="{{ asset("storage/$category->pdf") }}" target="_blank" class="btn btn-info">
                                    <i class="fas fa-file-pdf"></i> {{ __('Preview PDF') }}
                                </a>
                                <a href="{{ asset("storage/$category->pdf") }}" download class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> {{ __('Download PDF') }}
                                </a>
                            @endif

                    </div>

                </div>
            </div>
        @endforeach


    </div> --}}
    {{-- <div class="filters-content"> --}}
        {{-- <div class="row" > --}}
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-sm-6 col-lg-6 mb-4">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img class="card-img img-fluid" style="width: 100%; height: 700px; object-fit: cover;" src="{{ asset("storage/$category->photo") }}" alt="">
                            </div>
                            <div class="detail-box text-center" >
                                <h5>
                                    {!! $category->{app()->getLocale() . '_name'} !!}
                                </h5>
                                <p>
                                    {!! $category->{app()->getLocale() . '_content'} !!}
                                </p>
                                <div class="options" style="text-align: center; margin-top: 20px;">
                                    <a href="{{ route('allPreviousWorks', $category->id) }}" class="btn btn-primary">{{ __('Take a look') }}</a>
                                    @if($category->pdf)
                                    <a href="{{ asset("storage/$category->pdf") }}" target="_blank" class="btn btn-danger">
                                        <i class="fas fa-file-pdf"></i> {{ __('attachment') }}
                                    </a>
                                    {{-- <a href="{{ asset("storage/$category->pdf") }}" download class="btn btn-danger">
                                        <i class="fas fa-file-pdf"></i> {{ __('Download attachment') }}
                                    </a> --}}
                                @endif
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
    
    
    {{-- End Body --}}
@endsection
