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
    
    <!-- Carousel -->
    <div class="content h-100" style="margin-top: 120px; margin-left: 20px; margin-right: 20px;">

        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide">
    
                <div class="carousel-inner">

                    @foreach ($artikel as $data)
                        <div class="carousel-item active">
                            <img src="{{ asset('images/artikel/' . $data->image) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.5); padding: 10px;"  width="50%" height="75%">
                                <h5>{{$data->nama_artikel}}</h5>
                                <p>{{$data->kategori->nama_kategori}}</p>
                                <a href="{{route ('new.show', $data->id) }}" class="btn btn-primary">Lihat lebih detail</a>
                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
    <!-- Akhir Carousel -->

    <!-- Content -->
     <div class="content mt-5">

        <div class="container">
            <div class="row">
                @foreach ($artikel as $data)
                <div class="col-3 mb-3">
                    <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/artikel/' . $data->image) }}"  width="100%" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{$data->nama_artikel}}</h5>
                            <p class="card-text">{{$data->kategori->nama_kategori}}</p>
                            <a href="{{route ('new.show', $data->id) }}" class="btn btn-primary">Lihat lebih detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
    <!-- Content -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <!-- Akhir Boostrap -->
</body>
</html>