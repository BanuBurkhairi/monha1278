<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('judulTab')</title>
        <link rel="shortcut icon" href="{{ asset('img/brand_logo.png') }}" type="image/x-icon">
        <link href="{{ asset('dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ asset('dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>
    </head>
<body>
    <script src="{{ asset('dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
              <a href=".">
                <img src="{{ asset('img/banner-logo.png') }}" width="200" alt="Monha">
              </a>
            </h1> 
            <div class="collapse navbar-collapse" id="sidebar-menu">
              <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('dashboard') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-analytics"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" /><path d="M7 20l10 0" /><path d="M9 16l0 4" /><path d="M15 16l0 4" /><path d="M8 12l3 -3l2 2l3 -3" /></svg>
                      </span>
                    <span class="nav-link-title">
                      Beranda
                    </span>
                  </a>
                </li>
                <li class="nav-item {{ request()->routeIs('commodities') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('commodities.index') }}" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-salad"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.53 3.152l3.742 2.339q 1.492 -.491 3.472 -.491h2.256a1 1 0 0 1 1 1l-.001 1.336l-.05 .895l-.042 .585c-.037 .457 -.08 .84 -.134 1.185l.227 -.001a2 2 0 0 1 2 2v.5c0 1.694 -2.247 5.49 -3.983 6.983l-.017 .013v.504a2 2 0 0 1 -1.85 1.995l-.15 .005h-8a2 2 0 0 1 -2 -2v-.496l-.065 -.053c-1.76 -1.496 -3.794 -4.965 -3.928 -6.77l-.007 -.181v-.5a2 2 0 0 1 2 -2h.078a14 14 0 0 1 -.078 -1v-1a1 1 0 0 1 1 -1h1.755c.138 0 .287 .034 .44 .092l.835 -3.335a1 1 0 0 1 1.5 -.605m-2.193 5.847l-1.335 .001l.027 .42q .025 .292 .064 .58h.942q .078 -.533 .302 -1.001m10.663 -1.999h-1.256c-1.712 0 -3.003 .31 -3.922 .88a3.5 3.5 0 0 1 1.143 2.12h3.774c.127 -.615 .194 -1.4 .261 -2.714zm-7.5 2a1.5 1.5 0 0 0 -1.414 1h2.828a1.5 1.5 0 0 0 -.845 -.888l-.166 -.056a1.5 1.5 0 0 0 -.403 -.056m-.864 -3.424l-.415 1.665a3.5 3.5 0 0 1 1.502 -.234a6 6 0 0 1 .497 -.442z" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Komoditas
                      </span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('price.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Harga Bulanan
                    </span>
                  </a>
                </li>
                @if (Auth::user()->role == 1)
                <li class="nav-item">
                    <a class="nav-link" href="./" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-briefcase"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 13.478v4.522a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-4.522l.553 .277a20.999 20.999 0 0 0 18.897 -.002l.55 -.275zm-8 -11.478a3 3 0 0 1 3 3v1h2a3 3 0 0 1 3 3v2.242l-1.447 .724a19.002 19.002 0 0 1 -16.726 .186l-.647 -.32l-1.18 -.59v-2.242a3 3 0 0 1 3 -3h2v-1a3 3 0 0 1 3 -3h4zm-2 8a1 1 0 0 0 -1 1a1 1 0 1 0 2 .01c0 -.562 -.448 -1.01 -1 -1.01zm2 -6h-4a1 1 0 0 0 -1 1v1h6v-1a1 1 0 0 0 -1 -1z" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Administrator
                      </span>
                    </a>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </aside>
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" >
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
              <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                  <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                </a>
              </div>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                  <span class="avatar avatar-sm" style="background-image: url({{ asset('img/' . Auth::user()->id . '.jpg') }})"></span>
                  <div class="d-none d-xl-block ps-2">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="mt-1 small text-muted">
                        @if (Auth::user()->role == 1)
                            Admin Web
                        @else
                            Operator Web
                        @endif
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Keluar</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div>
                    
                </div>
            </div>
          </div>
        </header>
        <div class="page-wrapper">
          <!-- Page header -->
          <div class="page-header d-print-none">
            <div class="container-xl">
              @yield('page-header')
            </div>
          </div>
          <!-- Page body -->
          <div class="page-body">
            <div class="container-xl">
              <div class="row row-deck row-cards">
                @yield('page-body')
              </div>
            </div>
          </div>
          <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
              <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Dibuat dengan
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                        oleh Tim Rilis Inflasi
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                      Copyright &copy; 2024
                      <a href="https://gunungsitolikota.bps.go.id" class="link-secondary">BPS Kota Gunungsitoli</a>.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
    </div>
    @yield('popup')
    <!-- perJSan -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="{{ asset('dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1684106062') }}" defer></script>
    @yield('jees')
</body>
</body>
</html>