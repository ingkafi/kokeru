@extends('layouts.dashboardAdmin')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
    {{ session('status') }}
    </div>
@endif

    <!-- Page content -->
    <div class="container-fluid mt--6" >
      <div class="row">
        @foreach ($rooms as $rm)
        <div class="col">
              <div class="card" style="width: 23rem;">
                <img class="card-img-top" src={{asset('uploads/foto_ruang/'.$rm->foto_ruang)}} />
                <div class="card-body">
                  <h2 class="card-title">Ruang {{$rm->nama_ruang}} 
                    @if($rm->status =='BELUM')
                      <a class="btn btn-danger btn-sm disabled" style="color: white ; border-radius:100px; float:right;" > {{$rm->status}}</a> </h2>
                    @else
                    <a class="btn btn-success btn-sm disabled" style="color: white ; border-radius:100px; float:right;" > {{$rm->status}}</a> </h2>
                    @endif
                  <p class="card-text">Gedung {{$rm->gedung}} -  {{$rm->petugas}}</p>
                  @if($rm->status =='BELUM')
                  <a href="/admin/room/{{$rm->id_ruang}}" class="btn btn-primary btn-sm" style="color:white">Edit</a>
                  @else                    
                  <form method="POST">
                  <a href="/admin/room/{{$rm->id_ruang}}" class="btn btn-primary btn-sm" style="color:white">Edit</a>
                  <a href="/admin/room/{{$rm->id_ruang}}/foto" class="btn btn-info btn-sm" style="color: white"> Cek Foto</a>
                  @method('patch')
                  @csrf
                    <a href="/admin/room/{{$rm->id_ruang}}/resetStatus" class="btn btn-danger btn-sm">Reset Status</a>
                  </form>
                  @endif                     
                </div>
              </div>
        </div>
        @endforeach
      </div>
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
