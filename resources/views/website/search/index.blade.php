@extends('layouts.site.app')

@section('content')

            @forelse($results as $result)
                    @if ($result instanceof \App\Models\AboutUs)
                    {{-- <style>
                        #mbody1 {
                            text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
                        }
                    </style> --}}
                    <div class="contaienre" style="padding-top: 0%">
                        <div class="video-container">
                            <!-- Add video here -->
                            {{-- <video autoplay loop muted style="width: 100%; height: 100%; object-fit: cover;">
                                <source src="{{ asset("storage/" .( \App\Models\MediaFile::first()->about_video ?? '')) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                            </video> --}}
                        </div>
                        <!-- معلومات الشركة -->
                        <div  class="text-center" style="color: darkgoldenrod;" class="col">
                            <br>
                            <br>
                            <h2 >{{ $result->{app()->getLocale() . '_company_name'} ??  __('El-Fateh') }}</h2>
                            <p>{!! ($result->{app()->getLocale() . '_about_text'} ?? '') !!}</p>
                            <a href="{{ route('about.index') }}" style="color: darkgoldenrod; text-decoration: underline;">
                                <h5>{{ __('Go to About Us section') }}</h5>
                            </a>
                        </div>
                    </div>



                    @elseif ($result instanceof \App\Models\Article)
                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card h-100" style="border: 1px solid #000000; box-shadow: 0px 0px 10px 0px #0000000D;">
                                    <img src="{{ asset("storage/$result->image") }}" class="card-img-top" alt="card image">
                                    <div class="card-body" style="text-align:center;">
                                        <h5>{!! $result->{app()->getLocale() . '_title'} !!}</h5>
                                        <p>{!! $result->{app()->getLocale() . '_content'} !!}</p>
                                        <div class="options" style="text-align: center; margin-top: 20px;">
                                            <a href="{{ route('front-articles.show', $result->id) }}" class="btn btn-primary"
                                                style="background-color: darkgoldenrod;">{{ __('Take a look') }}</a>
                                            @if($result->pdf)
                                            <a href="{{ asset("storage/$result->pdf") }}" target="_blank" class="btn btn-danger">
                                                <i class="fas fa-file-pdf"></i> {{ __('attachment') }}
                                            </a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    




                    @elseif ($result instanceof \App\Models\ArticleCategory)
             <div class="row justify-content-center mt-4" >
                 <br>
                     <div class="col-sm-6 col-lg-4 mb-4">
                         <div class="box">
                             <div>
                                 <div class="img-box">
                                     <img class="card-img img-fluid" style="width: 100%; height: 700px; object-fit: cover;" src="{{ asset("storage/$result->photo") }}" alt="">
                                 </div>
                                 <div class="detail-box text-center" >
                                     <h5>
                                         {!! $result->{app()->getLocale() . '_name'} !!}
                                     </h5>
                                     <p>
                                         {!! $result->{app()->getLocale() . '_content'} !!}
                                     </p>
                                     <div class="options" style="text-align: center; margin-top: 20px;">
                                         <a href="{{ route('show_articles', $result->id) }}" class="btn btn-primary">{{ __('Take a look') }}</a>
                                         @if($result->pdf)
                                         <a href="{{ asset("storage/$result->pdf") }}" target="_blank" class="btn btn-danger">
                                             <i class="fas fa-file-pdf"></i> {{ __('attachment') }}
                                         </a>
                                     @endif
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
             </div>
         


                    @elseif ($result instanceof \App\Models\Branch)

                    {{-- <div class="container"> --}}
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                {{-- <div class="col"> --}}
                                    {{-- <div class="col"> --}}
                                        <br>
                                        <br>
                                                <div class="detail-box text-center" >
                                                    <p class="card-text">
                                                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Branch name') }}:</span> {!! $result->{app()->getLocale() . '_name' } !!}
                                                        </p>
                                                        <p class="card-text">
                                                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Address') }}:</span> {!! $result->{app()->getLocale() . '_address' } !!}
                                                        </p>
                                                        @foreach ($result->phoneNumbers as $number)
                                                        <p class="card-text">
                                                            @if($number->title == 'whatsapp')
                                                                <a href="https://api.whatsapp.com/send?phone={{ $number->phone_number }}" target="_blank" style="color: darkgoldenrod; text-decoration: underline;" title="Open WhatsApp">
                                                                    <i class="fab fa-whatsapp"></i>
                                                                    {{-- <span style="font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}: </span> --}}
                                                                    <span style="color: darkgoldenrod; font-weight:bold">{{ $number->phone_number }}</span>
                                                                </a>
                                                            @elseif($number->title == 'telegram')
                                                                <a href="https://t.me/{{ $number->phone_number }}" target="_blank" style="color: darkgoldenrod; text-decoration: underline;" title="Open Telegram">
                                                                    <i class="fab fa-telegram-plane"></i>
                                                                    {{-- <span style="font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}: </span> --}}
                                                                    <span style="color: darkgoldenrod; font-weight:bold">{{ $number->phone_number }}</span>
                                                                </a>
                                                            @else
                                                                <i style="color: darkgoldenrod;" class="fas fa-phone"></i>
                                                                {{-- <span style="color: darkgoldenrod; font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}:</span> --}}
                                                                <span style="color: darkgoldenrod; font-weight:bold"> {{ $number->phone_number }}</span>
                                                            @endif
                                                        </p>
                                                        @endforeach
                                                        
                                </div>
                            </div>
                        </div>
                    <br>

                    @elseif ($result instanceof \App\Models\Category)
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-lg-6 mb-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="card-img img-fluid" style="width: 100%; height: 700px; object-fit: cover;" src="{{ asset("storage/$result->photo") }}" alt="">
                                    </div>
                                    <div class="detail-box text-center">
                                        <h5>
                                            {!! $result->{app()->getLocale() . '_name'} !!}
                                        </h5>
                                        <p>
                                            {!! $result->{app()->getLocale() . '_content'} !!}
                                        </p>
                                        <div class="options" style="text-align: center; margin-top: 20px;">
                                            <a href="{{ route('allPreviousWorks', $result->id) }}" class="btn btn-primary">{{ __('Take a look') }}</a>
                                            @if($result->pdf)
                                                <a href="{{ asset("storage/$result->pdf") }}" target="_blank" class="btn btn-danger">
                                                    <i class="fas fa-file-pdf"></i> {{ __('attachment') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
<br>
                    @elseif ($result instanceof \App\Models\PreviousWork)
                    <div class="col">
                        <div class="content" style="padding-top:20px ;">
                            <div class="dec">
                                <div class="row">
                                    <div class="col">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @if (isset($result->images))
                                                @foreach (json_decode($result->images) as $key => $image)
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
                                <h3 class="col" style="text-align: center;">{!! $result->{app()->getLocale().'_title'} !!}</h5>
                                    <p style="  margin-top: 30px; font-size: large; padding-inline:70px ; font-weight: bold;">{!!
                                        $result->{app()->getLocale().'_description'} !!}</p>
                                    <div><a href="{{ route('previousWork', $result->id) }}" class="btnn btn-primary" style="margin-top: 50px; background-color: darkgoldenrod;
                                        color: white;
                                        border: none;
                                        text-align: center;
                                        text-decoration: none;
                                        font-size: 16px;
                                        margin-top: 20px;
                                        cursor: pointer;
                                        border-radius: 5px;"> {{ __('Take a look') }}</a>
                                        @if($result->pdf)
                                        <a href="{{ asset("storage/$result->pdf") }}" target="_blank" class="btn btn-danger">
                                            <i class="fas fa-file-pdf"></i> {{ __('attachment') }}
                                        </a>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>

<br>

                    @elseif ($result instanceof \App\Models\WhyUs)
                    <br>
                    {{-- <style>
                        #mbody1{
                            text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
                                margin-top: 30px;
                        }
                        /*  */
                        </style> --}}
                          {{-- <div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
                                <video autoplay muted loop style="width:100%">
                                    <source src="{{ asset("storage/" . (\App\Models\MediaFile::first()->home_video ?? '')) }}" type="video/mp4">
                                </video>
                           </div> --}}
                            <div class="row justify-content-center">
                                <div class="col text-center">
                                    <h1 style="color: darkgoldenrod;">{{ __('Our services') }}</h1>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div class="col text-center">
                                        <h2 style="font-size: large; color: darkgoldenrod;">
                                            {!! $result->{app()->getLocale().'_title'} !!}
                                        </h2>
                                        <p>{!! $result->{app()->getLocale().'_content'} !!}</p>
                                        <a href="{{ route('whyUs.index') }}" style="color: darkgoldenrod; text-decoration: underline;">
                                            <h5>{{ __('Go to Why Us section') }}</h5>
                                        </a>
            
                                    </div>
                                </div>
                            </div>
                        </div>   
                        
                    @endif
                    @empty
                    <div  class="text-center" style="color: darkgoldenrod;" class="col">
                        <br>
                        <br>
                        <h2 > {{ __('No results found') }}</h2>
                    </div>
                </div>
                    @endforelse 
        
@endsection
