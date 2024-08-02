@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <form action="{{ route('menu.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="font-weight-bold">Foto Menu</label>
                        <img src="{{ Storage::url('foto_menu/' . $menu->foto_menu) }}" alt="{{ $menu->nama_menu }}" class="rounded" style="width: 150px">
                        <input type="file" class="form-control @error('foto_menu') is-invalid @enderror" name="foto_menu">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Nama Menu</label>
                        <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" placeholder="Masukkan Nama Menu">
                    
                        <!-- error message untuk nama_menu -->
                        @error('nama_menu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Harga Menu</label>
                        <input type="text" class="form-control @error('harga_menu') is-invalid @enderror" name="harga_menu" value="{{ old('harga_menu', $menu->harga_menu) }}" placeholder="Masukkan Harga Menu">
                    
                        <!-- error message untuk harga_menu -->
                        @error('harga_menu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi Menu</label>
                        <textarea class="form-control @error('deskripsi_menu') is-invalid @enderror" name="deskripsi_menu" rows="5" placeholder="Masukkan Deskripsi Menu">{{ old('deskripsi_menu', $menu->deskripsi_menu) }}</textarea>
                    
                        <!-- error message untuk deskripsi_menu -->
                        @error('deskripsi_menu')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

                </form> 
            </div>
        </div>
    </div>
</div>
@endsection
