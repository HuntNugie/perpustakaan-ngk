@extends("layouts.app")

@section("content")
<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Buku Perpustakaan</h2>
    <form action="{{ route("perpustakaan.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="jdl_buku" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="jdl_buku" name="jdl_buku" required>
      </div>

      <div class="mb-3">
        <label for="pengarang" class="form-label">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" required>
      </div>

      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" required>
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Upload Foto Buku</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
      </div>

      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </div>
@endsection
