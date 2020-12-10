<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Kokeru | Landing Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Kokeru | Dashboard Petugas</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="../assets2/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="{{ URL::asset('assets2/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets2/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets2/css/argon.css?v=1.2.0') }}" type="text/css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif;
        }

        body,
        html {
            height: 100%;
            line-height: 1.8;
        }

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-image: url("/img/landing.png");
            min-height: 65%;
        }

        .bgimg-2 {
            background-position: center;
            background-size: cover;
            background-color: azure;
            min-height: 100%;
        }

        .w3-bar .w3-button {
            padding: 16px;
            border-radius: 25px;
        }

    </style>
</head>

<body>
    <div class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
        @if (Route::has('login'))
            <div class="w3-display-middle w3-text-white" style="text-align: center">
                <span class="w3-xxxlarge w3-hide-small"><b>Selamat datang di Kokeru!</b></span><br>
                <span class="w3-large">Sistem kontrol kebersihan ruangan</span><br>
                @auth
                    <a href="{{ url('/home') }}"
                        class="w3-button w3-round-xxlarge w3-padding-large w3-large w3-margin-top w3-hover-white"
                        style="background-color: #15e0ae"><b>Home</b></a>
                @else
                    <a href="{{ route('login') }}"
                        class="w3-button w3-round-xxlarge w3-padding-large w3-large w3-margin-top w3-hover-white"
                        style="background-color: #15e0ae"><b>Login</b></a>

                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}"
                            class="w3-button w3-round-xxlarge w3-padding-large w3-large w3-margin-top w3-hover-white"
                            style="background-color: #427ffc"><b>Register</b></a> --}}
                    @endif
                @endauth
            </div>
        @endif

    </div> <br>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-12 text-center">
                <a class="w3-xlarge" style="text-align: center"><b>Status Kebersihan Ruangan</b></a><br> <br>
            </div>
            <div class="bgimg-2 w3-display-container" id="home">
                <div class="row">
                    @foreach ($rooms as $rm)
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src={{ asset('uploads/foto_ruang/' . $rm->foto_ruang) }} />
                                <div class="card-body">
                                    <h2 class="card-title">Ruang {{ $rm->nama_ruang }}
                                        @if ($rm->status == 'BELUM')
                                            <a class="btn btn-danger btn-sm disabled"
                                                style="color: white ; border-radius:100px; float:right;">
                                                {{ $rm->status }}</a>
                                    </h2>
                                @else
                                    <a class="btn btn-success btn-sm disabled"
                                        style="color: white ; border-radius:100px; float:right;"> {{ $rm->status }}</a>
                                    </h2>
                    @endif
                    <p class="card-text">Gedung {{ $rm->gedung }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    </div>
    </div>
    <script>
        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }


        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }

    </script>
</body>

</html>
