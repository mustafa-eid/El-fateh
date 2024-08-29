@extends('layouts.site.app')

@section('content')
<h1 style="  margin-top: 30px; " class="word text-center" class="row ">{{ __('Previous works') }}</h1>
<div class="col">

    @foreach ($previousWorks as $previousWork)
    <div class="content" style="padding-top:20px ;">
        <div class="dec">
            {{-- <img src="{{ asset(" storage/$previousWork->image") }}" class="image"> --}}
            <div class="row">
                <div class="col">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @if (isset($previousWork->images))
                            @foreach (json_decode($previousWork->images) as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Slide {{ $key }}"
                                    style="object-fit: cover; height: 600px;">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <h3 class="col" style="text-align: center;">{!! $previousWork->{app()->getLocale().'_title'} !!}</h5>
                <p style="  margin-top: 30px; font-size: large; padding-inline:70px ; font-weight: bold;">{!!
                    $previousWork->{app()->getLocale().'_description'} !!}</p>
                <div><a href="{{ route('previousWork', $previousWork->id) }}" class="btnn btn-primary" style="margin-top: 50px; background-color: darkgoldenrod;
    color: white;
    border: none;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin-top: 20px;
    cursor: pointer;
    border-radius: 5px;"> {{ __('Take a look') }}</a>
                    @if($previousWork->pdf)
                    <a href="{{ asset("storage/$previousWork->pdf") }}" target="_blank" class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> {{ __('attachment') }}
                    </a>
                    {{-- <a href="{{ asset("storage/$previousWork->pdf") }}" download class="btn btn-danger">
                        <i class="fas fa-file-pdf"></i> {{ __('Download attachment') }}
                    </a> --}}
                    @endif


                </div>

        </div>
    </div>
</div>


@endforeach


@endsection