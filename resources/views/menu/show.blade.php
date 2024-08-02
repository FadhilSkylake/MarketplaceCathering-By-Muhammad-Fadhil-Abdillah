@extends('app')

@section('content')
<div class="row">
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">SHOW DETAIL MENU</h5>
                    <img src="{{ Storage::url('foto_menu/' . $menu->foto_menu) }}" alt="{{ $menu->nama_menu }}" class="rounded" style="width: 150px">
                    <h4>{{ $menu->nama_menu }}</h4>
                    <p class="tmt-3">
                        Harga {!! $menu->harga_menu !!}
                    </p>
                    <p class="tmt-3">
                        {!! $menu->deskripsi_menu !!}
                    </p>
                    <a href="javascript:window.history.back();">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
