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
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Detail Ruangan</h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
              <form action="/petugas/room/{{$room->id_ruang}}" method="post" enctype="multipart/form-data">
                @method('patch');
                @csrf
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th>Ruangan</th>
                      <th>Gedung</th>
                      <th>Status</th>
                      <th>Bukti</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                    <th>{{$room->nama_ruang}}</th>
                    <th>{{$room->gedung}}</th>
                    {{-- <th>{{$room->status}}</th> --}}
                    <th>
                            {{-- @csrf
                            <input type="text" class="form-control"  name="status" id="status" value="{{$room->status}}"> --}}
                            <select class="form-control" name="status" id="status">
                              <option selected>{{$room->status}}</option>
                              <option value="BELUM">BELUM</option>
                              <option value="SUDAH">SUDAH</option>
                            </select>
                    </th>
                    <th>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
            
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>            
            
                        <div class="custom-file">
                            <input type="file" name="foto_bukti[]" class="custom-file-input" id="images" multiple="multiple">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                         </th>
                      <td>
                          <button class="btn btn-info" type="submit" name="submit">Selesai</button>
                      </td>
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
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
      $(function() {
      // Multiple images preview with JavaScript
      var multiImgPreview = function(input, imgPreviewPlaceholder) {

          if (input.files) {
              var filesAmount = input.files.length;

              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();

                  reader.onload = function(event) {
                      $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                  }

                  reader.readAsDataURL(input.files[i]);
              }
          }

      };

      $('#images').on('change', function() {
          multiImgPreview(this, 'div.imgPreview');
      });
      });    
  </script>
</body>

</html>
@endsection

