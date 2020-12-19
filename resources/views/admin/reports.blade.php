@extends('layouts.dashboardAdmin')

@section('content')

    <body>
        <div class="container-fluid mt--8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-2">Riwayat Laporan Kebersihan Ruangan</h3>
                    {{-- <a href="/admin/deleteAllReports" class="btn btn-danger btn-sm"
                        style="color:white; float:right"
                        onclick="return confirm('Apakah anda yakin ingin hapus semua laporan?')">Hapus Semua Laporan</a>
                    --}}
                    <form action="{{ url('admin/reports') }}" method="post">
                        @csrf
                        <p>Cari laporan pada tanggal :</p>
                        @if ($date == null)
                            <input value="Pilih Tanggal " class=" textbox-n" type="text" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="date" name="date">
                        @else
                            <input value="{{ date('j-n-Y', strtotime($date)) }}" class=" textbox-n" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name="date">
                        @endif
                        <input type="submit" value="Kirim">
                    </form>

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($report as $rp)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <?php
                                    $monthNum = date('m', strtotime($rp->tanggal));
                                    $dateObj = DateTime::createFromFormat('!m', $monthNum);
                                    $monthName = $dateObj->format('F');
                                    ?>
                                    <th>{{ date('j', strtotime($rp->tanggal)) }} {{ $monthName }}
                                        {{ date('Y', strtotime($rp->tanggal)) }}
                                    </th>
                                    <th>{{ $rp->status }}</th>
                                    <th><a href="/admin/reports/{{ $rp->id_reports }}" class="btn btn-primary btn-sm"
                                            style="color:white">Lihat Laporan</a>
                                        <a href="/admin/reports/{{ $rp->id_reports }}/delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin hapus laporan pada tanggal {{ $date }}?')"
                                            style="color:white">Hapus Laporan</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--5">
            <div class="row">
                <div class="col"> <br><br><br>
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h1 class="mb-2" style="text-align: center">Kebersihan Ruangan Hari ini</h1>
                            <h3 style="text-align: center">Pilih Status :</h3>
                            <div class="wrapper text-center">
                                @if (Request::is('admin/reportsBelum'))
                                    <a href="/admin/reports" class="btn btn-outline-info btn-sm"
                                        style="color:#0099cc; background:none">SEMUA</a>
                                    <a href="/admin/reportsBelum" class="btn btn-danger btn-sm"
                                        style="color:white">BELUM</a>
                                    <a href="/admin/reportsSudah" class="btn btn-outline-success btn-sm"
                                        style="color: #28c29a; background:none">SUDAH</a>
                                @elseif(Request::is('admin/reportsSudah'))
                                    <a href="/admin/reports" class="btn btn-outline-info btn-sm"
                                        style="color:#0099cc; background:none">SEMUA</a>
                                    <a href="/admin/reportsBelum" class="btn btn-outline-danger btn-sm"
                                        style="color:red; background:none">BELUM</a>
                                    <a href="/admin/reportsSudah" class="btn btn-success btn-sm"
                                        style="color: white">SUDAH</a>
                                @else
                                    <a href="/admin/reports" class="btn btn-info btn-sm" style="color:white">SEMUA</a>
                                    <a href="/admin/reportsBelum" class="btn btn-outline-danger btn-sm"
                                        style="color:red; background:none">BELUM</a>
                                    <a href="/admin/reportsSudah" class="btn btn-outline-success btn-sm"
                                        style="color: #28c29a; background:none">SUDAH</a>

                                @endif
                            </div>
                            <br> <br>
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
                            </table> <br>
                            @if (Request::is('admin/reportsBelum'))
                                <a href="{{ url('admin/cetakReportsBelum') }}" class="btn btn-danger btn-sm mr-5"
                                    style="float:right">Simpan Sebagai
                                    PDF </a>
                            @elseif(Request::is('admin/reportsSudah'))
                                <a href="{{ url('admin/cetakReportsSudah') }}" class="btn btn-danger btn-sm mr-5"
                                    style="float:right">Simpan Sebagai
                                    PDF </a>
                            @else
                                <a href="{{ url('admin/cetakReportsSemua') }}" class="btn btn-danger btn-sm mr-5"
                                    style="float:right">Simpan Sebagai
                                    PDF </a>

                            @endif

                        </div><br>

                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
