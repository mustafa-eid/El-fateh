@extends('layouts.site.app')
@section('content')
<style>
    #mbody1 {   
        direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
        text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
    }
    #map {
        height: 500px;
        width: 100%;
    }
</style>
<div class="col" id="mbody1">

    <div class="col" id="mbody1">
        <br>
        <br>
        <h1 style="text-align: center;color:darkgoldenrod" class="word">{{ __('Branches') }}</h1>
        <hr style="height: 1mm;background-color:darkgoldenrod ;width: 2%;border-radius: 100px;">
    </div>
    
    <div id="map"></div>
    
    <div class="row mt-4">
        @foreach($branches as $branch)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Branch name') }}:</span> {!! $branch->{app()->getLocale() . '_name' } !!}
                        </p>
                        <p class="card-text">
                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Address') }}:</span> {!! $branch->{app()->getLocale() . '_address' } !!}
                        </p>
                        @foreach ($branch->phoneNumbers as $number)
                        <p class="card-text">
                            @if($number->title == 'whatsapp')
                                <a href="https://api.whatsapp.com/send?phone={{ $number->phone_number }}" target="_blank" style="color: darkgoldenrod; text-decoration: underline;" title="Open WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                    <span style="color: darkgoldenrod; font-weight:bold">{{ $number->phone_number }}</span>
                                </a>
                            @elseif($number->title == 'telegram')
                                <a href="https://t.me/{{ $number->phone_number }}" target="_blank" style="color: darkgoldenrod; text-decoration: underline;" title="Open Telegram">
                                    <i class="fab fa-telegram-plane"></i>
                                    <span style="color: darkgoldenrod; font-weight:bold">{{ $number->phone_number }}</span>
                                </a>
                            @else
                                <a href="tel:{{ $number->phone_number }}" style="color: darkgoldenrod; text-decoration: underline;" title="Call">
                                    <i style="color: darkgoldenrod;" class="fas fa-phone"></i>
                                    <span style="color: darkgoldenrod; font-weight:bold"> {{ $number->phone_number }}</span>
                                </a>
                            @endif
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc4op2z5AnCNM5hgYKl5M4mDsV_rILD4Y&libraries=geometry"></script>
<script>
    function initMap() {
        var mapOptions = {
            zoom: 8,
            center: {lat: {{ $branches->first()->latitude ?? '' }}, lng: {{ $branches->first()->longitude ?? '' }}},
            gestureHandling: 'cooperative' // Allow both scroll and zoom gestures
        };

        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var bounds = new google.maps.LatLngBounds();

        @foreach($branches as $branch)
            var marker = new google.maps.Marker({
                position: {lat: {{ $branch->latitude ?? '' }}, lng: {{ $branch->longitude ?? '' }}},
                map: map,
                title: '{{ $branch->{app()->getLocale() . "_name"} }}'
            });

            var label = new google.maps.InfoWindow({
                content: '<div style="text-align: center; font-weight: bold; color: darkgoldenrod;">{{ $branch->{app()->getLocale() . "_name"} }}</div>'
            });

            label.open(map, marker);

            marker.addListener('click', function() {
                label.open(map, marker);
            });

            bounds.extend(marker.position);
        @endforeach

        map.fitBounds(bounds);
    }

    google.maps.event.addDomListener(window, 'load', initMap);
</script>
