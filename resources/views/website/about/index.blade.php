@extends('layouts.site.app')

@section('content')
    <style>
        #mbody1 {
            text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
            /* تعيين الاتجاه النصي للجسم إلى {{ app()->getLocale() == 'en' ? 'اليسار' : 'اليمين' }} */
        }
    </style>
    {{--  --}}
    <div class="contaienre" style="padding-top: 0%">
        <!-- فيديو -->
        <div class="video-container">
            <!-- Add video here -->
            <video autoplay loop muted style="width: 100%; height: 100%; object-fit: cover;">
                <source src="{{ asset("storage/" .( \App\Models\MediaFile::first()->about_video ?? '')) }}" type="video/mp4">
                    Your browser does not support the video tag.
            </video>
        </div>
        <!-- معلومات الشركة -->
        <div id="mbody1"  class="col">
            <h2 style="color: darkgoldenrod;">{{ $aboutUs->{app()->getLocale() . '_company_name'} ??  __('El-Fateh') }}</h2>
            <p style="color: white">{!! ($aboutUs->{app()->getLocale() . '_about_text'} ?? '') !!}</p>
        </div>
    </div>
@endsection
