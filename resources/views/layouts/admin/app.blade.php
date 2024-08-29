<!DOCTYPE html>
<html lang="en">
    <head>
        @php
        $aboutUs = \App\Models\AboutUs::first();
        @endphp
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
        <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
        @if (isset($aboutUs->logo))
        <link rel="icon" href="{{ asset('storage/'.$aboutUs->logo) }}" type="image/x-icon">
        @else
        <link rel="icon" href="{{ url('/') }}/assets/images/logo.jpeg" type="image/x-icon">
        @endif
        <title>{{ $aboutUs->en_company_name ?? 'El-Fateh' }}</title>

        <link rel="stylesheet" href="{{ url('/') }}/admin/assets/css/luno-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



        <script src="{{ url('/') }}/admin/assets/js/plugins.js"></script>

        <style>
        .app-demo {
        position: relative;
        overflow: hidden;
        }

        .app-demo .card-overlay {
        position: absolute;
        top: -60px;
        left: -60px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--secondary-color);
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all .5s;
        transition: all .5s;
        z-index: 1;
        }

        .app-demo:hover .card-overlay {
        -webkit-transform: scale(35);
        transform: scale(35);
        }

        .app-demo:hover .demo-text {
        opacity: 1;
        transform: translateY(0);
        }

        .app-demo .demo-text {
        transition: all .3s;
        transition-delay: .1s;
        transform: translateY(20px);
        display: flex;
        flex-direction: column;
        position: absolute;
        z-index: 2;
        text-align: center;
        justify-content: center;
        width: calc(100% - 1rem);
        height: calc(100% - 1rem);
        align-items: center;
        color: #fff;
        opacity: 0;
        }
    </style>
    @yield('styles')
    </head>

    <body class="layout-1" data-luno="theme-blue">

        {{-- Start Sidebar --}}
        @include('admin.include.sidebar')
        {{-- Start Sidebar --}}
        {{-- ***************** --}}
        <div class="wrapper">
        {{-- Start header --}}
        @include('admin.include.header')
        {{-- Start header --}}
        {{-- ***************** --}}
        {{-- Start Body --}}
      @yield('content')
        {{-- Start Body --}}
        {{-- ***************** --}}

        {{-- Start Footer --}}
        {{-- @include('admin.include.footer') --}}
        {{-- Start Footer --}}
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ url('/') }}/admin/assets/js/theme.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        @yield('scripts')

    </body>

</html>