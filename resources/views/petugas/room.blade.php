@extends('layouts.dashboardPetugas')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!-- Page content -->
    <div class="container-fluid mt--8">
        <div class="col-md-12 text-center">
            <div class="date text-right" style="color: white;font-size: 150%;"><b> Halo Petugas {{ $rooms[0]->petugas }}
                </b> <br>
                <script>
                    var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
                    document.write(hari[new Date().getDay()])

                </script>
                <script>
                    document.write(new Date().getDate())

                </script>
                <script>
                    var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                        "Oktober", "November", "Desember"
                    ];
                    document.write(months[new Date().getMonth()])

                </script>
                <script>
                    document.write(new Date().getFullYear())

                </script>
                <div id="curr_time">
                    <script>
                        var div = document.getElementById('curr_time');

                        function time() {
                            div.innerHTML = "";
                            var d = new Date();
                            var s = d.getSeconds();
                            var m = d.getMinutes();
                            var h = d.getHours();
                            div.innerHTML = h + ":" + m + ":" + s + " WIB";
                        }
                        setInterval(time, 1000);

                    </script>
                </div>
            </div> <br>
        </div><br><br>
        <div class="row">
            @foreach ($rooms as $rm)
                <div class="col">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="{{ asset('uploads/foto_ruang/' . $rm->foto_ruang) }}" alt="">
                        <div class="card-body">
                            <h2 class="card-title">Ruang {{ $rm->nama_ruang }}
                                @if ($rm->status == 'BELUM')
                                    <a class="btn btn-danger btn-sm disabled"
                                        style="color: white ; border-radius:100px; float:right;"> {{ $rm->status }}</a>
                            </h2>
                        @else
                            <a class="btn btn-success btn-sm disabled"
                                style="color: white ; border-radius:100px; float:right;"> {{ $rm->status }}</a> </h2>
            @endif
            @if ($rm->status == 'BELUM')
                <span class="badge badge-dot mr-4">
                    <a href="/petugas/room/{{ $rm->id_ruang }}" class="btn btn-primary btn-sm"
                        style="color:white">Detail</a>
                @else
                </span>
                <a href="/petugas/room/{{ $rm->id_ruang }}" class="btn btn-primary btn-sm" style="color:white">Detail</a>
                <a href="/petugas/room/{{ $rm->id_ruang }}/foto" class="btn btn-info btn-sm" style="color: white"> <i
                        class="bg-warning"></i> Cek Foto</a>
            @endif
        </div>
    </div>
    </div>
    @endforeach
</div>
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
