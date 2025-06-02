<!DOCTYPE html>
<html lang="id">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>@yield('title', 'Sistem Inventaris Barang')</title>
    <meta 
    name="viewport" 
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no" 
    />

  <link 
    rel="icon" 
    href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" 
    type="image/x-icon" 
    />

  <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ["{{ asset('assets/css/fonts.min.css') }}"]
      },
      active: function () {
        sessionStorage.fonts = true;
      }
    });
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">
</head>
<body>
  <div class="wrapper">

    @include('partials.navbar')

    <div class="main-panel">

      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>
