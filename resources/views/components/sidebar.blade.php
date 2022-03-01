<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data Management</div>
                <a class="nav-link" href="{{ route('countryHome') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-intersect"></i></div>
                    Negara
                </a>
                <a class="nav-link" href="{{ route('provinceHome') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-layers-half"></i></div>
                    Provinsi
                </a>
                <div class="sb-sidenav-menu-heading">Dokumentasi API</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Dokumentasi API
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('introductionAPI') }}"><div class="sb-nav-link-icon"><i class="bi bi-arrow-bar-right"></i></i></div>Introduction</a>
                        <a class="nav-link" href="{{ route('countryAPI') }}"><div class="sb-nav-link-icon"><i class="bi bi-intersect"></i></div>Negara</a>
                        <a class="nav-link" href="{{ route('provinceAPI') }}"><div class="sb-nav-link-icon"><i class="bi bi-layers-half"></i></div>Provinsi</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>