@extends('app')

@section('content')
<div class="row">
  
  <div class=" d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">MERCHANT</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">No</th>
                <th class="border-bottom-0">Username</th>
                <th class="border-bottom-0">Merchant Name</th>
                <th class="border-bottom-0">alamat</th>
                <th class="border-bottom-0">Kontak</th>
                <th class="border-bottom-0">Deskripsi</th>
                <th class="border-bottom-0">Action</th>
              </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($merchant as $merch)
              <tr>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center p-2">
                    <div class="ms-3">
                      <h6 class="fw-semibold mb-0">{{ $i++ }}</h6>
                    </div>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $merch->user->name }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $merch->merchant_name }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $merch->alamat }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $merch->kontak }}</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $merch->deskripsi }}</p>
                </td>
                <td class="border-bottom-0">
                    <a class="btn btn-sm btn-warning" href="{{ route('merchant.edit', $merch->id) }}">EDIT</a>
                    <form action="{{ route('merchant.destroy', $merch->id) }}" method="POST" style="display:inline;">
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
