@extends("layouts.app")

@section("content")
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Buku Perpustakaan</h2>
    <form action="{{ route("perpustakaan.update",$perpus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="mb-3">
        <label for="jdl_buku" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="jdl_buku" name="jdl_buku" value="{{ $perpus->jdl_buku }}">
      </div>

      <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $perpus->pengarang }}">
      </div>

      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $perpus->penerbit }}">
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" value="{{ $perpus->harga }}">
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Upload Foto Buku</label>
        <div class="m-3">
            <img src="{{ asset("storage") }}/{{ $perpus->foto }}" height="150px" width="150px" alt="">
        </div>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" >
      </div>

      <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
  </div>
@endsection
