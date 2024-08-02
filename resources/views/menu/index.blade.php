@extends('app')

@section('content')
<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">LIST MENU</h5>
        <a href="{{ route('menu.create') }}">Create New Menu</a>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">No</th>
                <th class="border-bottom-0">Foto Menu</th>
                <th class="border-bottom-0">Nama Menu</th>
                <th class="border-bottom-0">Deskripsi Menu</th>
                <th class="border-bottom-0">Harga Menu</th>
                <th class="border-bottom-0">Action</th>
              </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($menu as $mn)
              <tr>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center p-2">
                    <div class="ms-3">
                      <h6 class="fw-semibold mb-0">{{ $i++ }}</h6>
                    </div>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <img src="{{ Storage::url('foto_menu/' . $mn->foto_menu) }}" alt="{{ $mn->nama_menu }}" class="rounded" style="width: 150px">
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $mn->nama_menu }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $mn->deskripsi_menu }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $mn->harga_menu }}</p>
                </td>
                <td class="border-bottom-0">
                    <a class="btn btn-sm btn-success" href="">ADD TO CHART</a><br>
                    <a href="{{ route('menu.show', $mn->id_menu) }}" class="btn btn-sm btn-dark">SHOW</a><br>
                    <a class="btn btn-sm btn-warning" href="{{ route('menu.edit', $mn->id_menu) }}">EDIT</a><br>
                    <form action="{{ route('menu.destroy', $mn->id_menu) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">DELETE</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
       
      </div>
    </div>
  </div>
</div>

@endsection
