@extends('layouts.site.app')
@section('content')
<style>
    #mbody1 {   
        direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
        text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
    }
</style>
<div class="col" id="mbody1">

    <div class="col" id="mbody1">
<br>
<br>
    {{-- <h1 style="color: darkgoldenrod;" id="mbody1" data-ar="{{ __('Branches') }}" data-en="Branches">{{ __('Branches') }}</h1> --}}
    <h1 style="text-align: center;color:darkgoldenrod" class="word">{{ __('Branches') }}</h1><hr style="height: 1mm;background-color:darkgoldenrod ;width: 2%;border-radius: 100px;">

</div>
    <div class="row">
        @foreach($branches as $branch)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Branch name') }}:</span> {{ $branch->{app()->getLocale() . '_name' } }}
                        </p>
                        <p class="card-text">
                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Address') }}:</span> {{ $branch->{app()->getLocale() . '_address' } }}
                        </p>
                        @foreach ($branch->phoneNumbers as $number)
                        <p class="card-text">
                            @if($number->en_title == 'whatsapp')
                                <a href="https://api.whatsapp.com/send?phone={{ $number->phone_number }}" target="_blank" style="color: darkgoldenrod; text-decoration: underline;" title="Open WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                    <span style="font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}: </span>
                                    <span style="color: darkgoldenrod; font-weight:bold">{{ $number->phone_number }}</span>
                                </a>
                            @elseif($number->en_title == 'telegram')
                                <a href="https://t.me/{{ $number->phone_number }}" target="_blank" style="color: darkgoldenrod; text-decoration: underline;" title="Open Telegram">
                                    <i class="fab fa-telegram-plane"></i>
                                    <span style="font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}: </span>
                                    <span style="color: darkgoldenrod; font-weight:bold">{{ $number->phone_number }}</span>
                                </a>
                            @else
                                <i style="color: darkgoldenrod;" class="fas fa-phone"></i>
                                <span style="color: darkgoldenrod; font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}:</span>
                                <span style="color: darkgoldenrod; font-weight:bold"> {{ $number->phone_number }}</span>
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
