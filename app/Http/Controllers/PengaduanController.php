<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pengaduan', compact('pengaduan'));
    }

    public function destroy($id) {
        $saran = Pengaduan::find($id);
        $saran->delete();

        return redirect('/pengaduan')->with('success', 'Pengaduan berhasil dihapus!');
    }

    public function delete() {
        $pengaduan = Pengaduan::all();
        return view('admin.delete_pengaduan', compact('pengaduan'));
    }

    public function show($id) {
        $pengaduan = Pengaduan::find($id);
        return view('admin.detail_pengaduan', compact('pengaduan'));
    }
}
