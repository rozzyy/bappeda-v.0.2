<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Resources\PengumumanResource;
use App\Http\Resources\PengumumanSearchResource;

class PengumumanController extends Controller
{
    public function pengumuman() {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return PengumumanResource::collection($pengumuman);
    }

    public function show(Pengumuman $pengumuman) {
        return new PengumumanResource($pengumuman);
    }

    public function search(Request $request) {
        $data = $request->get('data');
        $pengumuman = Pengumuman::where('judul', 'like', '%' . $data . '%')->paginate(5);

        return PengumumanSearchResource::collection($pengumuman);
    }
}
