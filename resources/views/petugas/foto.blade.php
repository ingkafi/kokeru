@extends('layouts.dashboardPetugas')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            @foreach ($room as $rm)
                <?php $images = json_decode($rm->foto_bukti); ?>
                @foreach ($images as $file)
                <?php  
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                $explodeImage = explode('.', $file);
                $extension = end($explodeImage);
                ?>
                @if (! in_array($extension, $imageExtensions))
                <div class="col">
                    <div class="card" style="width: 23rem;">
                        <video width="400" height="250" controls class="thumb" data-full="{{ asset('uploads/foto_bukti/' . $file) }}">
                            <source src="{{ asset('uploads/foto_bukti/' . $file) }}">
                            </video> 
                        </div>
                    </div>
                @else
                <div class="col">
                    <div class="card" style="width: 23rem;">
                        <img class="card-img-top" src={{ asset('uploads/foto_bukti/' . $file) }} /> 
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
        </div>
        <a href="/petugas/room" class="btn btn-outline-danger" style="align-content:center">
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
    </body>

    </html>
@endsection
