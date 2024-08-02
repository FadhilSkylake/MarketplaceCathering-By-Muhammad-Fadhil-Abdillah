@extends('app')

@section('content')
<div class="row">
  
    <div class=" d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">ADD MENU</h5>
    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama_menu">Nama Menu:</label>
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example" type="text" id="nama_menu" name="nama_menu">
        <label for="deskripsi_menu">Deskripsi Menu:</label>
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example" type="text" id="deskripsi_menu" name="deskripsi_menu">
      
        <div class="form-group">
            <label class="font-weight-bold">GAMBAR</label>
            <input  type="file" class="form-control @error('foto_menu') is-invalid @enderror" name="foto_menu">
        
            <!-- error message untuk title -->
            @error('foto_menu')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="harga_menu">Harga Menu:</label>
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example" type="text" id="harga_menu" name="harga_menu"><br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</div>
</div>
</div>
@endsection
