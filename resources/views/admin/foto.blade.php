@extends('layouts.dashboardAdmin')

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
                    <div class="col">
                        <div class="card" style="width: 23rem;">
                            <img class="card-img-top" src={{ asset('uploads/foto_bukti/' . $file) }} />
                        </div>
                    </div>
                @endforeach

            @endforeach
        </div>
        <a href="/admin/room" class="btn btn-outline-danger" style="align-content:center">
            <- Kembali </a>
                <!-- Footer -->
    </div>
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
