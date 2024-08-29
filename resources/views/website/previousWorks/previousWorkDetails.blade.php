@extends('layouts.site.app')

@section('content')
    <div class="row">
        <div class="col">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @if (isset($previousWork->images))
                        @foreach (json_decode($previousWork->images) as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100"
                                    alt="Slide {{ $key }}" style="object-fit: cover; height: 600px;">
                            </div>
                        @endforeach
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <style>
        #mbody2 {
            text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};

        }
    </style>
    <div id="mbody2" class="col">
       <br>
        <p id="mbody2" style="font-size: 50px;color: darkgoldenrod;margin:40px;">
            {!! $previousWork->{app()->getLocale() . '_title'} !!}</p>
        <p id="mbody2" style=" font-size: large;font-weight: bold;margin:40px;" >
            {!! $previousWork->{app()->getLocale() . '_description'} !!}</p>
        <ul id="mbody2" class="list-unstyled" style="font-size: 16px;margin:40px;">
            <li><strong>{{ __('Client') }}:</strong> {{ $previousWork->{app()->getLocale() . '_client'} }}</li>
            <li><strong>{{ __('Engineer name') }}:</strong> {{ $previousWork->{app()->getLocale() . '_engineer_name'} }}</li>
            <li><strong>{{ __('Location') }}:</strong> {{ $previousWork->{app()->getLocale() . '_location'} }}</li>
            <li><strong>{{ __('Started At') }}:</strong>
                {{ \Carbon\Carbon::parse($previousWork->started_at)->format('d/m/Y') }}</li>
            <li><strong>{{ __('Ended At') }}:</strong>
                {{ \Carbon\Carbon::parse($previousWork->ended_at)->format('d/m/Y') }}</li>
            @if (isset($previousWork->total_area))
                <li><strong>{{ __('Total Building Area') }}:</strong> {{ $previousWork->total_area }}</li>
            @endif
            @if (isset($previousWork->total_units))
                <li><strong>{{ __('Total Units') }}:</strong> {{ $previousWork->total_units }}</li>
            @endif
            @if (isset($previousWork->total_concrete))
                <li><strong>{{ __('Total Concrete') }}:</strong> {{ $previousWork->total_concrete }}</li>
            @endif
        </ul>

    </div>



@endsection
