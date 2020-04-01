<?php

namespace App\Http\Controllers;

use App\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function index() {
        $saran = Saran::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.saran', compact('saran'));
    }

    public function destroy($id) {
        $saran = Saran::find($id);
        $saran->delete();

        return redirect('/saran')->with('success', 'Berita berhasil dihapus!');
    }

    public function delete() {
        $saran = Saran::all();
        return view('admin.delete_saran', compact('saran'));
    }

    public function show($id) {
        $saran = Saran::find($id);
        return view('admin.detail_saran', compact('saran'));
    }
}
