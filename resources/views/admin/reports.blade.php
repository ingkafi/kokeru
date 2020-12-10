<!DOCTYPE html>
<html>

<head>
    <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
        }

    </style>
</head>

<body>
    <br />
    <div class="container">
        <h3 style="text-align:center">Laporan Kebersihan Ruangan</h3><br />
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

        <div class="row">
            <div class="col-md-7" style="text-align:right">
                <h4>Room Data</h4>
            </div>
            <div class="col-md-5" style="text-align:right">
                <a href="{{ url('admin/reports/pdf') }}" class="btn btn-danger">Convert into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Ruang</th>
                        <th>Gedung</th>
                        <th>Petugas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms_data as $room)
                        <tr>
                            <td>{{ $room->nama_ruang }}</td>
                            <td>{{ $room->gedung }}</td>
                            <td>{{ $room->petugas }}</td>
                            <td>{{ $room->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
