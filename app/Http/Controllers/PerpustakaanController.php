<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('perpustakaan',["perpus" => Perpustakaan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-perpus');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "jdl_buku" => "required | string",
            "pengarang" => "required | string",
            "penerbit" => "required | string",
            "harga" => "required | integer",
            "foto" => "required | image | mimes:jpg,jpeg,png | max:2048"
        ]);
        $file = $request->file('foto');
        $namaBaru = Str::random().'-'.$file->getClientOriginalName();
        $foto = $file->storeAs("perpus",$namaBaru,"public");
        Perpustakaan::create([
            "jdl_buku" => $request->jdl_buku,
            "pengarang" => $request->pengarang,
            "penerbit" => $request->penerbit,
            "harga" => $request->harga,
            "foto" => $foto
        ]);

        return redirect()->route('perpustakaan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perpustakaan $perpustakaan)
    {
        return view("edit-perpus",["perpus" => $perpustakaan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perpustakaan $perpustakaan)
    {
        $valid = $request->validate([
            "jdl_buku" => "required | string",
            "pengarang" => "required | string",
            "penerbit" => "required | string",
            "harga" => "required | integer",
            "foto" => " image | mimes:jpg,jpeg,png | max:2048"
        ]);

        // cek apakah foto nya mau di ganti
        if($request->hasFile("foto")){
            // hapus foto yang lama
            if(Storage::disk("public")->exists($perpustakaan->foto)){
                Storage::disk("public")->delete($perpustakaan->foto);
            }
            // upload foto baru
            $file = $request->file("foto");
            $namaBaru = Str::random()."-".$file->getClientOriginalName();
            $foto = $file->storeAs("perpustakaan",$namaBaru,"public");
            $valid["foto"] = $foto;
        }

        // tambahkan kedalam database
        $perpustakaan->update($valid);
        return redirect()->route("perpustakaan.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $perpus = Perpustakaan::findOrFail($id);

    //    mengecek apakah foto user itu ada di penyimpanan
       if(Storage::disk("public")->exists($perpus->foto)){
            // jika ketemu maka hapus fotonya
            Storage::disk("public")->delete($perpus->foto);
       }
    //    baru kita hapus data nya dari database
    $perpus->delete();
    return redirect()->route("perpustakaan.index");
    }
}
