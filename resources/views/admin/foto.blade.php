@extends('layouts.dashboardAdmin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            @foreach ($room as $rm)
                <?php $images = json_decode($rm->foto_bukti); ?>
                @foreach ($images as $file)
                    <?php
                    $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico',
                    'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                    $explodeImage = explode('.', $file);
                    $extension = end($explodeImage);
                    ?>
                    @if (!in_array($extension, $imageExtensions))
                        <div class="col">
                            <div class="card" style="width: 23rem;">
                                <video width="400" height="250" controls class="thumb"
                                    data-full="{{ asset('uploads/foto_bukti/' . $file) }}">
                                    <source src="{{ asset('uploads/foto_bukti/' . $file) }}">
                                </video>
                            </div>
                        </div>
                    @else
                        <div class="col">
                            <div class="card" style="width: 23rem;">
                                <img class="card-img-top" style="width:cover;cursor:pointer" onclick="onClick(this)"
                                    class="w3-hover-opacity" src={{ asset('uploads/foto_bukti/' . $file) }} />
                            </div>
                            <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                <div class="w3-modal-content w3-animate-zoom">
                                    <img id="img01" style="width:80%">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        <a href="/admin/room" class="btn btn-outline-danger" style="align-content:center">
            <- Kembali </a> <br><br>
                <!-- Footer -->
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }

    </script>
    </body>

    </html>
@endsection
