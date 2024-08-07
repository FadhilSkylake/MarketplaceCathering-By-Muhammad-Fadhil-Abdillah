@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
            <h5 class="card-title fw-semibold mb-4">Edit </h5>
            <div class="card-body">
                <form action="{{ route('merchant.update', $merchant->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="font-weight-bold">Merchant Name</label>
                        <input type="text" class="form-control @error('merchant_name') is-invalid @enderror" name="merchant_name" value="{{ old('merchant_name', $merchant->merchant_name) }}" placeholder="Masukkan Nama Merchant">
                    
                        <!-- error message untuk merchant_name -->
                        @error('merchant_name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $merchant->alamat) }}" placeholder="Masukkan Alamat">
                    
                        <!-- error message untuk alamat -->
                        @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kontak</label>
                        <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ old('kontak', $merchant->kontak) }}" placeholder="Masukkan Kontak">
                    
                        <!-- error message untuk kontak -->
                        @error('kontak')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $merchant->deskripsi) }}</textarea>
                    
                        <!-- error message untuk deskripsi -->
                        @error('deskripsi')
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
