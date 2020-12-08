@extends('layouts.dashboardPetugas')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
    {{ session('status') }}
    </div>
@endif
    <!-- Page content -->
    <div class="container-fluid mt--7" >
      <div class="col-md-12 text-center"> 
        <div class="date text-right" style="color: white;font-size: 150%;" ><b> Tugas | </b> 
        <script>
            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            document.write(hari[new Date().getDay()])
        </script>, 
        <script>
            document.write(new Date().getDate())
        </script> 
        <script>
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            document.write(months[new Date().getMonth()])
        </script> 
        <script>
            document.write(new Date().getFullYear())
        </script><div id="curr_time">
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
                <img class="card-img-top" src="{{asset('uploads/foto_ruang/'.$rm->foto_ruang)}}" alt="">
                <div class="card-body">
                  <h2 class="card-title">{{$rm->nama_ruang}}</h2>
                  @if($rm->status =='BELUM')
                  <span class="badge badge-dot mr-4">
                    <a class="status" style="color: black" ><i class="bg-warning"></i> {{$rm->status}}</a>
                  </span>
                    <a href="/petugas/room/{{$rm->id_ruang}}" class="btn btn-primary btn-sm" style="color:white">Details</a>
                  @else
                  <span class="badge badge-dot mr-4">
                      <a class="status" style="color: black" ><i class="bg-success"></i> {{$rm->status}}</a>
                  </span>
                    <a href="" class="btn btn-info btn-sm" style="color: white"> <i class="bg-warning"></i> Cek Foto</a>
                    <a href="/petugas/room/{{$rm->id_ruang}}" class="btn btn-primary btn-sm" style="color:white">Details</a>
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
