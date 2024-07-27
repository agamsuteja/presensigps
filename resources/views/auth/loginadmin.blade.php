<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title></title>
    <!-- CSS files -->
    <link href="{{asset('tabler/dist/css/tabler.min.css?1668287865')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-flags.min.css?1668287865')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-payments.min.css?1668287865')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/tabler-vendors.min.css?1668287865')}}" rel="stylesheet"/>
    <link href="{{asset('tabler/dist/css/demo.min.css?1668287865')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
        --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
        background-image: url('{{ asset('tabler/static/back.jpg') }}'); /* URL gambar background */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .container-normal {
        max-width: 400px;
        background: rgba(0, 0, 0, 0.8); /* Background transparan */
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .custom-card {
        background-color: transparent; /* Ubah warna latar belakang */
        border: 1px solid transparent; /* Ubah warna border */
        border-radius: 8px; /* Ubah sudut border */
      }

      .custom-card .card-body {
        color: #340202; /* Ubah warna teks */
      }

      .navbar-brand {
      color: #ff8100; /* Ganti dengan warna yang diinginkan */
      text-decoration: none; /* Hapus garis bawah pada link */
      }
  
      .navbar-brand:hover {
        color: #ff8100; /* Warna saat hover, opsional */
      }

      .navbar-brand img {
        margin-right: 10px; /* Ganti dengan jarak yang diinginkan */
      }

      .form-control {
        color: #000000; /* Ubah warna teks di input menjadi hitam atau warna yang kontras */
        background-color: #ffffff; /* Pastikan latar belakang input berwarna putih atau warna yang kontras */
      }

      .form-control::placeholder {
        color: #3a0000; /* Warna placeholder */
      }

    </style>
  </head>
  <body class="border-top-wide border-primary d-flex flex-column">
    <script src="{{asset('tabler/dist/js/demo-theme.min.js?1668287865')}}"></script>
    <div class="container container-normal py-4">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark">
          <img src="{{ asset('tabler/static/esc10.png') }}" height="36" alt="Logo">
          Esc Absensi 
        </a>
      </div>
      <div class="card card-md custom-card">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
          @if (Session::get('warning'))
            <div class="alert alert-warning">
              <p>{{ Session::get('warning') }}</p>
            </div>
          @endif
          <form action="./prosesloginadmin" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="mb-3">
              {{-- <label class="form-label">Email address</label> --}}
              <input type="email" name="email" class="form-control" placeholder="Your @gmail" autocomplete="off" required>
            </div>
            <div class="mb-2">
              <label class="form-label">
                
                <span class="form-label-description">
                  {{-- <a href="./forgot-password.html">I forgot password</a> --}}
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="off" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="12" cy="12" r="2"/>
                      <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                    </svg>
                  </a>
                </span>
              </div>
            </div>
            {{-- <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div> --}}
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{asset('tabler/dist/js/tabler.min.js?1668287865')}}" defer></script>
    <script src="{{asset('tabler/dist/js/demo.min.js?1668287865')}}" defer></script>
  </body>
</html>
