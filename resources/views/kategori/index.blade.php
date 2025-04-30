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

    <!-- table -->
    <div class="card" style="margin-top: 100px; margin-left: 20px; margin-right: 20px;">
        <div class="card-header text-center">
            Kategori
        </div>
        <div class="card-body">

        <table class="table">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Add</a>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            @php $no = 1; @endphp 
            @foreach ($kategori as $data)

            <tbody>
                <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$data->nama_kategori}}</td>
                <td class="text-center">
                    <a href=" {{ route('kategori.edit' , $data->id) }} " class="btn btn-success">Edit</a>
                    <a href=" {{ route('kategori.show' , $data->id) }}" class="btn btn-warning">Show</a>

                    <form action="{{ route('kategori.destroy', $data->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin inging menghapus?')" >Delete</button>
                    </form>
                </td>
                </tr>
            </tbody>

            @endforeach
        </div>
    </div>
    <!-- Table -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <!-- Akhir Boostrap -->
</body>
</html>