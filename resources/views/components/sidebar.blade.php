<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data Management</div>
                <a class="nav-link" href="{{ route('provinceHome') }}">
                    <div class="sb-nav-link-icon"></div>
                    Provinsi
                </a>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"></div>
                    Kabupaten / Kota
                </a>
                <div class="sb-sidenav-menu-heading">Dokumentasi API</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"></div>
                    Dokumentasi API
                </a>
                {{-- <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"></div>
                    Tables
                </a> --}}
            </div>
        </div>
    </nav>
</div>