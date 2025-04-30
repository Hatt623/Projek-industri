<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Today! -Artikel</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    
    <!--Akhir Boostrap -->
    
    <!-- Navbar -->
    @include('layouts.part.navbar')
    <!--Akhir Navbar -->

</head>
  <body>
    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!-- Boostrap -->
    
    <!-- main content -->
    <form action="{{ route('artikel.update' , $artikel->id) }}" method="post" enctype="multipart/form-data">  
        @csrf 
        @method('PUT')

    <div class="content h-100" style="margin-top: 120px; margin-left: 20px; margin-right: 20px;">

        <div class="container">

          <div class="card mb-3" style="max-width: 100%; max-height: 100%;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset ('images/artikel/' . $artikel->image) }}" class="img-fluid rounded-start" width="100%" height="200px" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h1 class="card-title text-center"> {{$artikel->nama_artikel}} </h1>
                  <hr style="border: 2px solid black; border-radius: 5px;">
                  
                  <p class="card-text">kategori: <b>  {{$artikel->kategori->nama_kategori}} </b></p>
                  <p class="card-text"><small class="text-body-secondary">Created at: <b> {{ $artikel->created_at }} </b></small></p>
                  <p class="card-text"><small class="text-body-secondary"> {{$artikel->isi}} </small></p>

                </div>
              </div>
            </div>
          </div>

        </div>
    </form>
    <!-- Akhir main content -->

    <!-- More news -->
        <div class="container">
          <h2 class="fw-bolder mb-4 text-center">More News</h2>

          <div class="row">
              @foreach ($allnews as $data)
              <div class="col-3 mb-3">
                  <div class="card" style="width: 18rem;">
                  <img src="{{ asset('images/artikel/' . $data->image) }}"  width="100%" height="200px" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"> {{$data->nama_artikel}}</h5>
                          <p class="card-text"> Kategori: <b>{{$data->kategori->nama_kategori}} </b></p>
                          <a href="{{route ('new.show', $data->id) }}" class="btn btn-primary">Lihat lebih detail</a>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>

        </div>
    <!-- Akhir more news -->
  
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <!-- Akhir Boostrap -->
</body>
</html>