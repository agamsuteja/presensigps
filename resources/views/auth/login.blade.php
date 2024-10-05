<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Absensi GPS</title>
    <meta name="description" content="Absensi GPS">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/esc10.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="__manifest.json">
    <style>
        body {
            background-image: url('assets/img/sample/photo/login2.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h1 {
            color: #333;
        }

        .form-image {
            width: 50px !important; /* Ukuran logo lebih kecil */
            height: auto !important;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: -50px; /* Menggeser logo ke atas */
        }



        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 25px;
            padding: 10px 20px;
            margin-bottom: 15px;
            width: 100%;
            font-size: 16px;
            color: #333;
        }

        .btn-primary {
            background: linear-gradient(to right, #ff8b20, #ff8b20) !important;
            border: none !important;
            border-radius: 25px !important;
            padding: 10px 15px !important;
            font-size: 16px !important;
            color: #fff !important;
            cursor: pointer !important;
            width: 100% !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2) !important;
            transition: all 0.3s ease !important;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #ff4500, #ff6347) !important;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3) !important;
        }

        .btn-primary:active {
            transform: translateY(2px) !important;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2) !important;
        }

        .form-button-group {
            background: none; /* Hilangkan latar belakang putih */
            padding: 0; /* Hilangkan padding jika ada */
            margin-top: 20px; /* Sesuaikan posisi tombol jika perlu */
        }

        .login-card {
            background: rgba(255, 255, 255, 0.7); /* Transparansi card */
            border-radius: 15px; /* Memberikan sudut tumpul */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Memberikan bayangan */
            max-width: 400px;
            margin: 0 auto; /* Agar center */
        }

        
    </style>
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
        <div class="login-form mt-1">
            <div class="section">
                <img src="assets/img/sample/photo/esc10.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Selamat Datang Di Sistem Absensi ESC Pontianak</h1>
                <h4>Login untuk Melakukan Absensi</h4>
            </div>
            <div class="section mt-1 mb-5">
                @if (Session::get('warning'))
                <div class="alert alert-outline-warning">
                    {{ Session::get('warning') }}
                </div>
                @endif
                <div class="login-card">
                    <form action="/proseslogin" method="POST">
                        @csrf
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
            
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
            
                        <div class="form-button-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- ///////////// Js Files ////////////////////  -->
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/base.js') }}"></script>

</body>

</html>
