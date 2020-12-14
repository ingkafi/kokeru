@extends('layouts.dashboardAdmin')

@section('content')

    <body>
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-2">Kebersihan Ruangan Hari ini</h3> <a href="{{ url('admin/reportstoday') }}"
                                class="btn btn-danger" style="float: right">Simpan
                                Sebagai PDF</a>
                            <script>
                                var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
                                document.write(hari[new Date().getDay()])

                            </script>,
                            <script>
                                document.write(new Date().getDate())

                            </script>
                            <script>
                                var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                                    "September",
                                    "Oktober", "November", "Desember"
                                ];
                                document.write(months[new Date().getMonth()])

                            </script>
                            <script>
                                document.write(new Date().getFullYear())

                            </script>
                            <br>

                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Ruang</th>
                                        <th>Gedung</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($rooms_data as $room)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <th>{{ $room->nama_ruang }}</th>
                                            <th>{{ $room->gedung }}</th>
                                            <th>{{ $room->petugas }}</th>
                                            <th>{{ $room->status }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div><br><br>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-2">Laporan Kebersihan Ruangan</h3> <a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($report as $rp)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th>{{ $rp->tanggal }}</th>
                                    <th><a href="/admin/reports/{{ $rp->id_reports }}" class="btn btn-primary btn-sm"
                                            style="color:white">Lihat Laporan</a>
                                        <a href="/admin/reports/{{ $rp->id_reports }}" class="btn btn-danger btn-sm"
                                            style="color:white">Hapus Laporan</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
