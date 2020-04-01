<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{


    public function index() {
        $berita = Berita::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.berita', compact('berita'));
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,gif,jpg,svg|max:2048',
        ]);

        $file = $request->file('foto');
        $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);
        $photoUrl = asset('public/images/' . $filename);

        $berita = new Berita([
            'judul' => $request->get('judul'),
            'isi' => $request->get('isi'),
            'image' => $filename,
            'image_url' => $photoUrl,
        ]);

        $berita->save();
        return redirect('/dashboard')->with('success', 'Berita berhasil dibuat!');
    }

    public function create() {
        return view('admin.add_form');
    }

    public function edit($id) {
        $berita = Berita::find($id);
        return view('admin.edit', compact('berita'));
    }

    public function update(Request $request, $id) {
        $berita = Berita::find($id);

        if( $file = $request->file('foto') != '') {
            $gambar_awal = $berita->image;
            File::delete('public/images/' . $gambar_awal);
            $file = $request->file('foto');
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $photoUrl = asset('public/images/' . $filename);
        } else {
            $filename = $berita->image;
            $photoUrl = asset('public/images/' . $filename);
        }

        $berita->update([
            'judul' => $request->get('judul'),
            'isi' => $request->get('isi'),
            'image' => $filename,
            'image_url' => $photoUrl,
        ]);

        $berita->save();
        return redirect('/dashboard')->with('success', 'Berita berhasil di update!');
    }

    public function destroy($id) {
        $berita = Berita::find($id);
        $gambar_awal = $berita->image;
        File::delete('public/images/' . $gambar_awal);
        $berita->delete();

        return redirect('/dashboard')->with('success', 'Berita berhasil dihapus!');
    }

    public function hapus() {
        $berita = Berita::all();
        return view('admin.delete_page', compact('berita'));
    }

    public function search(Request $request) {
        $search = $request->get('search');
        $berita = Berita::where('judul', 'like', '%' . $search . '%' )->paginate(5);
        return view('admin.search', compact(['berita', 'search']));
    }
}
