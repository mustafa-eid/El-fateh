<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @php
           $aboutUs=\App\Models\AboutUs::first();
        @endphp
        @if (isset($aboutUs->logo))
        <link rel="icon" href="{{ asset('storage/'.$aboutUs->logo) }}" type="image/x-icon">
        @else
        <link rel="icon" href="{{ url('/') }}/assets/images/logo.jpeg" type="image/x-icon">
        @endif
        <title>{{ $aboutUs->{app()->getLocale() . '_company_name'} ??  __('El-Fateh') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/main.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            .fa-twitter { color: darkgoldenrod; }
            .fa-linkedin-in { color:darkgoldenrod; }
            .fa-facebook { color:darkgoldenrod; }
            .fa-instagram { color:darkgoldenrod; }
            .fa-youtube { color: darkgoldenrod; }
          </style>


    </head>
<body >
        {{-- Start Header --}}
        @include('website.include.header')
        {{-- Start Header --}}

        {{-- Start Body --}}
        @yield('content')
        {{-- End Body --}}



{{-- Start Footer --}}
@include('website.include.footer')
{{-- End Footer --}}

      <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="{{ url('/') }}/js/main.js"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>