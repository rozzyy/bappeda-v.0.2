<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index() {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.pengumuman', compact('pengumuman'));
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
        ]);

        $pengumuman = new Pengumuman([
            'judul' => $request->get('judul'),
            'content' => $request->get('content'),
            'download' => $request->get('download'),
        ]);

        $pengumuman->save();
        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil dibuat!');
    }

    public function create() {
        return view('admin.add_pengumuman');
    }

    public function edit($id) {
        $pengumuman = Pengumuman::find($id);
        return view('admin.edit_pengumuman', compact('pengumuman'));
    }

    public function update(Request $request, $id) {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->update([
            'judul' => $request->get('judul'),
            'content' => $request->get('content'),
            'download' => $request->get('download'),
        ]);

        $pengumuman->save();
        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil di update!');
    }

    public function destroy($id) {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect('/pengumuman')->with('success', 'Berita berhasil dihapus!');
    }

    public function hapus() {
        $pengumuman = Pengumuman::all();
        return view('admin.hapus_pengumuman', compact('pengumuman'));
    }

}
