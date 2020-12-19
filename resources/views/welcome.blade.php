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
            background-image: linear-gradient(to right, #15e0ae, #427ffc);
            min-height: 90%;

        }

        .bgimg-4 {
            background-position: center;
            background-size: cover;
            background-color: azure;
            min-height: 90%;
            min-width: 100%;
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

        .header-left {
            float: left;
            vertical-align: center;
        }

        .header-right {
            vertical-align: center;
            float: right;
            /* background-color: rgba(255, 255, 255, 0.3);
            transition: all 0.5s; */
        }

    </style>
</head>

<body>

    @if (Route::has('login'))
        <div class="col-md-14">
            <div class="col-md-14 text-center navbar navbar-dark" style="background-color: azure">
                <div class="header-left">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="150" height="41">
                </div>
                {{-- <a class="w3-xxxlarge"
                    style="text-align: center; color:white;"><b>Selamat Datang di Kokeru !</b></a>
                --}}
                @auth
                    <div class="header-right">
                        @if (auth()->user()->is_admin == 1)
                            <a href="{{ url('/admin') }}" class="btn btn-info">Dashboard</a><br>
                        @else
                            <a href="{{ url('/petugas') }}" class="btn btn-info">Dashboard</a><br>
                        @endif
                    </div>
                @else
                    <div class="header-right">
                        <a href="{{ route('login') }}" class="btn btn-success">Log in</a><br>
                    </div>
                @endauth
            </div>
    @endif
    <div class="bgimg-4 w3-display-container container-fluid">
        <div class="text-center">
            <br><a class="w3-xlarge text-center" style="text-align: center;color:black; margin-top:10px;"><b>Status
                    Kebersihan
                    Ruangan</b></a><br> <br>
        </div>
        <div id="home">
            <div class="row">
                @foreach ($rooms as $rm)
                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            @if ($rm->status == 'BELUM')
                                <img class="card-img-top" src={{ asset('uploads/foto_ruang/' . $rm->foto_ruang) }} />
                                <div class="card-body text-center"
                                    style="background: linear-gradient(45deg,#FF5370,#ff869a);">
                                    <h1 class="card-title" style="color: white">Ruang {{ $rm->nama_ruang }}</h1>
                                    <h2><a style="color: white">{{ $rm->status }}</a></h2>
                                    <p class="card-text" style="color: white">Gedung {{ $rm->gedung }}</p>

                                </div>
                            @else
                                <img class="card-img-top" src={{ asset('uploads/foto_ruang/' . $rm->foto_ruang) }} />
                                <div class="card-body text-center"
                                    style="background: linear-gradient(45deg,#2ed8b6,#59e0c5);">
                                    <h1 class="card-title" style="color: white">Ruang {{ $rm->nama_ruang }}</h1>
                                    <h2><a style="color: white">{{ $rm->status }}</a></h2>
                                    <p class="card-text" style="color: white">Gedung {{ $rm->gedung }}</p>
                                </div>
                            @endif
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
