<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - MONHA</title>
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
    <div class="page page-center">
        <div class="container container-normal py-4">
          <div class="row align-items-center g-4">
            <div class="col-lg">
              <div class="container-tight">
                <div class="text-center mb-4">
                  <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('img/logo_bps1278.png') }}" height="72" alt=""></a>
                </div>
                <div class="card card-md">
                  <div class="card-body">
                    <h2 class="h2 text-center mb-4">WEB MONITORING HARGA</h2>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('/login') }}" method="post" autocomplete="off">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username BPS" autocomplete="off" required>
                      </div>
                      <div class="mb-2">
                        <label class="form-label">
                          Kata Sandi
                        </label>
                        <div class="input-group input-group-flat">
                          <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" autocomplete="off" required>
                        </div>
                      </div>
                        <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg d-none d-lg-block">
              <img src="{{ asset('img/login_cover.png') }}" height="400" class="d-block mx-auto" alt="">
            </div>
          </div>
        </div>
    </div>
    <!-- perJSan -->
    <script src="{{ asset('dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1684106062') }}" defer></script>
</body>
</html>