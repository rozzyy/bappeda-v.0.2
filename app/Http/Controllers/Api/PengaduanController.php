<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengaduanResource;
use App\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::latest()->paginate(5);
        return PengaduanResource::collection($pengaduan);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'pengaduan' => 'required',
        ]);

        $pengaduan = Pengaduan::create([
            'nama' => $request->get('nama'),
            'email' => $request->get('email'),
            'pengaduan' => $request->get('pengaduan'),
        ]);

        return new PengaduanResource($pengaduan);
    }

    public function show(Pengaduan $pengaduan) {
        return new PengaduanResource($pengaduan);
    }
}
