<!--Start Footer-->
<footer style="background-color:black; color: darkgoldenrod; padding: 70px; margin-top: 30px;">
  <div class="container-fluid">
    <div class="row justify-content-center w-100">
      <!-- Success Partners Carousel Section -->
      <section class="col-md-3 col-12 align-self-center">
        @php
        $successPartners = \App\Models\SuccessPartner::all();
        @endphp
        @if($successPartners->isNotEmpty())
          <div id="carouselExampleControls" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
              @php
              $successPartners = \App\Models\SuccessPartner::all();
              @endphp
              @if (isset($successPartners))
                @foreach ($successPartners as $key => $partner)
                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $partner->photo) }}" class="d-block w-100"
                      alt="Slide {{ $key }}" style="object-fit: cover; height: 200px;">
                    <div class="text-center">
                      <h5>{!! $partner->{app()->getLocale().'_name'} !!}</h5>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                  </a>
                @endforeach
              @endif
            </div>
          </div>
        @endif
      </section>
      <!-- Social Media Section -->
      <section class="col-md-3 col-12 align-self-center">
        <h1 href="#">
          @php
          $aboutUs = \App\Models\AboutUs::first();
          @endphp
          <span style="color: darkgoldenrod; font-weight: bold;">{{ $aboutUs->{app()->getLocale() . '_company_name'} ?? __('El-Fateh') }}</span>
        </h1>
        <p style="font-family: Poppins; font-size: 15px; font-weight: 400; line-height: 23px; text-align: left;">
          <a href="mailto:{{ \App\Models\ContactUs::first()->email ?? '' }}" style="color: darkgoldenrod;text-decoration: underline">
            <i class="fas fa-envelope" style="color: darkgoldenrod;"></i>
            {{ $aboutUs->email ?? '' }}
          </a>
        </p>
        <div class="font-asm d-flex" style="margin-top: 40px">
          @php
          $socialLinks = \App\Models\SocialMedia::get();
          @endphp
          @foreach ($socialLinks as $link)
            <a href="{{ $link->url }}" target="_blank" style="padding: 10px; color: darkgoldenrod;">
              @if ($link->platform == 'twitter')
                <i class="fa-brands fa-twitter fa-lg"></i>
              @elseif($link->platform == 'linkedIn')
                <i class="fa-brands fa-linkedin-in fa-lg"></i>
              @elseif($link->platform == 'facebook')
                <i class="fa-brands fa-facebook fa-lg"></i>
              @elseif($link->platform == 'instagram')
                <i class="fa-brands fa-instagram fa-lg"></i>
              @elseif($link->platform == 'youTube')
                <i class="fa-brands fa-youtube fa-lg"></i>
              @endif
            </a>
          @endforeach
        </div>
      </section>
      <!-- Contact Us Section -->
      <section class="col-md-3 col-12 align-self-center">
        <h1 style="font-family: Poppins; font-size: 24px; font-weight: 600; line-height: 36px; text-align: left;">
          {{ __('Contact us') }}
        </h1>
        <p style="font-family: Poppins; font-size: 15px; font-weight: 400; line-height: 23px; text-align: left;">
          {{ __('Address') }}:
          {{ (\App\Models\Branch::first()->{app()->getLocale() . '_address'}) ?? '' }}
        </p>
        @php
        $phone_numbers = \App\Models\Branch::first()->phoneNumbers ?? '';
        @endphp
        @if ($phone_numbers)
          @foreach ($phone_numbers as $number)
            <p style="font-family: Poppins; font-size: 15px; font-weight: 400; line-height: 23px; text-align: left;">
              @if ($number->title == 'whatsapp')
                <a href="https://api.whatsapp.com/send?phone={{ $number->phone_number }}" target="_blank"
                  style="color:darkgoldenrod;text-decoration: underline">
                  <i class="fab fa-whatsapp"></i> 
                  {{ $number->phone_number }}
                </a>
              @elseif($number->title == 'telegram')
                <a href="https://t.me/{{ $number->phone_number }}" target="_blank"
                  style="color:darkgoldenrod;text-decoration: underline">
                  <i class="fab fa-telegram-plane"></i>
                  {{ $number->phone_number }}
                </a>
              @else
                <a href="tel:{{ $number->phone_number }}" style="color:darkgoldenrod;text-decoration: underline">
                  <i class="fas fa-phone"></i> 
                  {{ $number->phone_number }}
                </a>
              @endif
            </p>
          @endforeach
        @endif
      </section>
      @php
      $qr_photo = \App\Models\MediaFile::first()->qr_photo ?? '';
      @endphp
      @if ($qr_photo)
      <section class="col-md-3 col-12 align-self-center">
        <h1 style="font-family: Poppins; font-size: 24px; font-weight: 600; line-height: 36px; text-align: left;">
          {{ __('Scan') }}</h1>
        <div>
          <img src="{{ asset('storage/' . $qr_photo) }}" style="width:30%;" alt="">
        </div>
      </section>
      @endif
    </div>
  </div>
</footer>
<!--End Footer-->
