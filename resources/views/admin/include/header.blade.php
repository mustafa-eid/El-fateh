<header class="page-header sticky-top px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
    @php
        $aboutUs = \App\Models\AboutUs::first();
    @endphp
    <div class="container-fluid">
        <nav class="navbar">
            <div class="d-flex">
                <a href="{{ route('dashboard') }}" class="brand-icon d-flex align-items-center mx-2 mx-sm-3 text-primary">
                    <h4>{{ $aboutUs->en_company_name ?? 'El-Fateh' }}</h4>
                </a>
            </div>

            <div class="header-left flex-grow-1 d-none d-md-block">
                <div class="main-search px-3 flex-fill">
                    {{-- <input class="form-control" type="text" placeholder="Enter your search key word"> --}}
                </div>
            </div>

            <ul class="header-right justify-content-end d-flex align-items-center mb-0">
                <li class="d-none d-xl-inline-block">
                    <a class="nav-link fullscreen" href="javascript:void(0);" onclick="toggleFullScreen(documentElement)">
                        <svg viewBox="0 0 16 16" width="18px" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <!-- SVG paths here -->
                        </svg>
                    </a>
                </li>

                <!-- Add the link to APP_URL here -->
                <li class="d-none d-xl-inline-block">
                    <a class="nav-link" href="{{ env('APP_URL') }}" target="_blank" style="color:rgb(50, 129, 255)">
                        <i class="fas fa-home" style="font-size: 18px; color: currentColor;"></i>
                        visit site
                    </a>
                </li>

                <li>
                    <div class="dropdown morphing scale-left user-profile mx-lg-3 mx-2">
                        <a class="nav-link dropdown-toggle rounded-circle after-none p-0" href="#" role="button" data-bs-toggle="dropdown">
                            @if (isset($aboutUs->logo))
                                <img class="avatar img-thumbnail rounded-circle shadow" src="{{ asset('storage/'.$aboutUs->logo) }}" alt="">
                            @else
                                <img class="avatar img-thumbnail rounded-circle shadow" src="{{ url('/') }}/assets/images/logo.jpeg" alt="">
                            @endif
                        </a>
                        <div class="dropdown-menu border-0 rounded-4 shadow p-0">
                            <div class="card border-0 w240">
                                <div class="card-body border-bottom ">
                                    <div class="flex-fill ms-3">
                                        <span class="text-muted"><a href="{{ route('dashboard') }}" class="_cf_email_" data-cfemail="3f5e5353565a584d5e4b5a4d7f534a5150115c5052">{{ Auth::guard('admin')->user()->email }}</a></span>
                                    </div>
                                </div>
                                <div class="list-group m-2 mb-3">
                                    <form id="logout-form" action="{{ route('logout.admin') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" id="logout-btn" class="btn bg-secondary text-light text-uppercase rounded-2">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>

<script>
    document.getElementById('logout-btn').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>
