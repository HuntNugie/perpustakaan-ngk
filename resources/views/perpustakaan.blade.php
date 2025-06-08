@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('perpustakaan.create') }}" class="btn btn-primary">Tambah data</a>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Judul Buku</th>
                                <th>Foto</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Harga</th>
                                <th>tanggal buat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perpus as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->jdl_buku }}</td>
                                <td>
                                    <img src="{{ asset("storage") }}/{{ $item->foto }}" height="150px" width="150px" alt="">
                                </td>
                                <td>{{ $item->pengarang }}</td>
                                <td>{{ $item->penerbit }}</td>
                                <td>Rp. {{ $item->harga }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         Aksi
                                        </a>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item text-primary" href="#">Lihat</a></li>
                                          <li><a class="dropdown-item text-warning" href="{{ route("perpustakaan.edit",$item->id) }}">Edit</a></li>
                                          <li>
                                              <form action="{{ route("perpustakaan.destroy",$item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                  <button class="dropdown-item text-danger" type="submit">Hapus</button>
                                              </form>
                                            </li>
                                        </ul>
                                    </div>
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
