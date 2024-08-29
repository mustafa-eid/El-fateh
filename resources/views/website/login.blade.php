<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ __('Responsive Bootstrap 5 admin dashboard template & web App ui kit.') }}">
    <meta name="keyword"
        content="{{ __('LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal') }}">
    <link rel="icon" href="{{ url('/') }}/assets/images/logo.jpeg" type="image/x-icon">
    <title>{{ __('Sign in') }}</title>

    <link rel="stylesheet" href="{{ url('/') }}/admin/assets/css/luno-style.css">

    <script src="{{ url('/') }}/admin/assets/js/plugins.js"></script>
    <style>
        .page-body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>

<body id="layout-1" data-luno="theme-blue">

    <div class="wrapper">
        <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <div class="row g-0 justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
                            <form class="row g-3" action="{{ route('login.user') }}" method="POST">
                                @csrf
                                <div class="col-12 text-center mb-5">
                                    <h1>{{ __('Sign in') }}</h1>
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Email address') }}</label>
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            placeholder="{{ __('name@example.com') }}" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Password') }}</label>
                                        <input id="password" class="form-control form-control-lg" type="password"
                                            name="password" maxlength="255" placeholder="{{ __('Enter the password') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot password?') }}</a>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase">
                                        {{ __('SIGN IN') }}</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">{{ __("Don't have an account yet?") }} <a
                                            href="{{ route('register') }}">{{ __('Sign up here') }}</a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
        <script>
            $(function() {
                $('#password').password()
            })
        </script>
    </div>

    <script src="{{ url('/') }}/admin/assets/js/theme.js"></script>

</body>

</html>
