<footer class="page-footer fixed-bottom px-xl-4 px-sm-2 px-0 py-3">
    @php
    $aboutUs = \App\Models\AboutUs::first();
    @endphp
    <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center">
        <p class="col-md-4 mb-0 text-muted">© 2024 <a href="https://www.thememakker.com/" target="_blank"
                title="ThemeMakker Infotech LLP">ThemeMakker</a>, All Rights Reserved.</p>
        <a href="#" class="col-md-4 d-flex align-items-center justify-content-center my-3 my-lg-0 me-lg-auto">
            <h4>{{ $aboutUs->en_company_name ?? 'El-Fateh' }}</h4>
        </a>
        <ul class="nav col-md-4 justify-content-center justify-content-lg-end">
            <li class="nav-item"><a href="https://themeforest.net/user/wrraptheme/portfolio" target="_blank"
                    class="nav-link px-2 text-muted">Portfolio</a></li>
            <li class="nav-item"><a href="https://themeforest.net/licenses/standard" target="_blank"
                    class="nav-link px-2 text-muted">Licenses</a></li>
            <li class="nav-item"><a href="https://help.market.envato.com/hc/en-us" target="_blank"
                    class="nav-link px-2 text-muted">Support</a></li>
            <li class="nav-item"><a href="https://themeforest.net/licenses/faq" target="_blank"
                    class="nav-link px-2 text-muted">FAQs</a></li>
        </ul>
    </div>
</footer>