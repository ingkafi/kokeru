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
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Detail Ruangan</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <form action="/admin/room/{{ $room->id_ruang }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Ruangan</th>
                                        <th>Gedung</th>
                                        <th>Status</th>
                                        <th>Petugas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <th><input type="text" class="form-control" name="nama_ruang" id="nama_ruang"
                                                value="{{ $room->nama_ruang }}"></th>
                                        <th><select class="form-control" name="gedung" id="gedung">
                                                <option selected>{{ $room->gedung }}</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                            </select>
                                        </th>
                                        <th>{{ $room->status }}</th>
                                        <th>
                                            <select class="form-control" name="petugas" id="petugas">
                                                <option value>{{ $room->petugas }}</option>
                                                @foreach ($user as $us)
                                                    <option value="{{ $us->name }}">{{ $us->name }}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th>
                                            <button class="btn btn-info">Selesai</button>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
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
