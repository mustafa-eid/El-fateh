@extends('layouts.site.app')

@section('content')
<style>
#mbody1{
    text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
        margin-top: 30px;
}
/*  */
</style>
  <div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
        <video autoplay muted loop style="width:100%">
            <source src="{{ asset("storage/" . (\App\Models\MediaFile::first()->home_video ?? '')) }}" type="video/mp4">
        </video>
   </div>
<div class="col" id="mbody1">
    <div class="col" id="mbody1">

    <h1 style="color: darkgoldenrod;" id="mbody1" data-ar="{{ __('Our services') }}" data-en="Our services">{{ __('Our services') }}</h1>
</div>
</div>

@foreach ($reasons as $reason)
<div class="col"  id="mbody1">
       <div class="col"> <h1  style="font-size: large;  color: darkgoldenrod;">{!! $reason->{app()->getLocale().'_title'} !!}</h2>
        <p>{!! $reason->{app()->getLocale().'_content'} !!}</p></div>
    </div>     

</div>

@endforeach


@endsection