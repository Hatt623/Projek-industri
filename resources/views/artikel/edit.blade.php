<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Today! -kategori</title>
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

    <div class="card" style="margin-top: 100px; margin-left: 20px; margin-right: 20px;">
        <div class="card-header text-center">
            Featured
        </div>
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            @method ('PUT')

            <div class="mb-3">
                <label for="nama_artikel" class="form-label">Judul artikel</label>
                <input type="text" class="form-control" id="nama_artikel" placeholder="Masukkan judul artikel anda" aria-describedby="basic-addon1" name="nama_artikel" value="{{$artikel->nama_artikel}}" required>
            </div>

            <div class="form-group">
                <label> Cover Artikel </label>
                <img class="mb-3" src="{{ asset('images/artikel/' . $artikel->image) }}" width="100px">
                <input type="file" class="form-control mb-3" name="image" value="{{$artikel->image}}" required>
            </div>

            <div class="mb-3">
                <label>Kategori artikel</label>
                <select class="form-control mb-3" name="kategori_id" id="kategori_id" required>
                    @foreach($kategori as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $artikel->kategori_id ? 'selected' : '' }}>{{ $data->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel</label>
                <textarea name="isi" aria-describedby="basic-addon1" class="form-control" id="isi" required>{{$artikel->isi}} </textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="Save" >Submit</button>
        </form>

        </div>
        <div class="card-footer text-body-secondary">
            Buatlah Artikel mu
        </div>
    </div>
    

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <!-- Akhir Boostrap -->
</body>
</html>