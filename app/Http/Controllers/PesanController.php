<?php

namespace App\Http\Controllers;

use App\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index() {
        $pesan = Pesan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pesan', compact('pesan'));
    }

    public function destroy($id) {
        $pesan = Pesan::find($id);
        $pesan->delete();

        return redirect('/pesan')->with('success', 'Pesan berhasil dihapus!');
    }

    public function delete() {
        $pesan = Pesan::all();
        return view('admin.delete_pesan', compact('pesan'));
    }

    public function show($id) {
        $pesan = Pesan::find($id);
        return view('admin.detail_pesan', compact('pesan'));
    }
}
