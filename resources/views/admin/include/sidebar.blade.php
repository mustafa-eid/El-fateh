<div class="sidebar p-0 gooo ">
    <div class="container-fluid">
        @php
        $aboutUs = \App\Models\AboutUs::first();
        @endphp
        <div class="title-tex my-3">
            <h4 class="sidebar-titl"><span>{{ $aboutUs->en_company_name ?? 'El-Fateh' }} Admin</span></h4>
        </div>
        <div class="main-menu ">
            <ul class="menu-list my-0">
                <li>
                    <a class="m-link {{ Route::is('admins.*') ? 'active' : '' }}" href="{{ route('admins.index') }}">
                        <span class="ms-2">{{ __('Admins') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <span class="ms-2">{{ __('Users') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <span class="ms-2">{{ __('Categories') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('previousWorks.*') ? 'active' : '' }}" href="{{ route('previousWorks.index') }}">
                        <span class="ms-2">Previous works</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('success-partners.*') ? 'active' : '' }}" href="{{ route('success-partners.index') }}">
                        <span class="ms-2">Success Partners</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('article-categories.*') ? 'active' : '' }}" href="{{ route('article-categories.index') }}">
                        <span class="ms-2">Categories of Engineering libraries</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">
                        <span class="ms-2">Engineering libraries</span>
                    </a>
                </li>



                <li>
                    <a class="m-link {{ Route::is('contactRequest.*') ? 'active' : '' }}" href="{{ route('contactRequest.index') }}">
                        <span class="ms-2">{{ __('Requests of users') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('request-types.*') ? 'active' : '' }}" href="{{ route('request-types.index') }}">
                        <span class="ms-2">{{ __('Request (Types, Services)') }}</span>
                    </a>
                </li>
                <!-- Dropdown for Contact and Branches -->
                {{-- <li>
                    <a class="m-link {{ Route::is('contact-us.*') || Route::is('branches.*') || Route::is('phone-numbers.*') ? 'active' : '' }} collapsed" data-bs-toggle="collapse" href="#contactBranches" aria-expanded="false" aria-controls="contactBranches">
                        <span class="ms-2">Contact us</span>
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="contactBranches">
                        <ul class="sub-menu"> --}}
                            {{-- <li>
                                <a class="m-link {{ Route::is('contact-us.*') ? 'active' : '' }}" href="{{ route('contact-us.index') }}">
                                    <span class="ms-3">Main branch</span>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a class="m-link {{ Route::is('branches.*') ? 'active' : '' }}" href="{{ route('branches.index') }}">
                                    <span class="ms-3">Branches</span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::is('phone-numbers.*') ? 'active' : '' }}" href="{{ route('phone-numbers.index') }}">
                                    <span class="ms-3">Branches numbers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <li>
                    <a class="m-link {{ Route::is('branches.*') ? 'active' : '' }}" href="{{ route('branches.index') }}">
                        <span class="ms-2">Branches</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('social-media.*') ? 'active' : '' }}" href="{{ route('social-media.index') }}">
                        <span class="ms-2">{{ __('Social media links') }}</span>
                    </a>
                </li>

                <li>
                    <a class="m-link {{ Route::is('media-files.*') ? 'active' : '' }}" href="{{ route('media-files.index') }}">
                        <span class="ms-2">{{ __('Media files') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('reasons.*') ? 'active' : '' }}" href="{{ route('reasons.index') }}">
                        <span class="ms-2">{{ __('Why us') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('about-us.*') ? 'active' : '' }}" href="{{ route('about-us.index') }}">
                        <span class="ms-2">{{ __('About us') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('setting.*') ? 'active' : '' }}" href="{{ route('setting.index') }}">
                        <span class="ms-2">{{ __('Setting') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<i class="fa-solid fa-list p-2" style="background-color: #EEEEEE;border-radius: 8px;" onclick="showSideBar()" id="myList"></i>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script>
    let listIcon= document.getElementById("myList")
let go = document.querySelector(".gooo")
function showSideBar(){
    if(go.style.left=="-260px"){
        go.style.left = 0
        listIcon.style.left= "260px"
    }
    else{
        go.style.left = "-260px"
        listIcon.style.left= 0
    }
}
</script>