<?php

namespace App\Http\Controllers\Api;

use App\Berita;
use App\Pengumuman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BeritaResource;
use App\Http\Resources\SearchResource;
use App\Http\Resources\PopulerResource;
use App\Http\Resources\GaleriResource;

class BeritaController extends Controller
{
    public function berita() {
        $berita = Berita::latest()->paginate(6);
        return BeritaResource::collection($berita);
    }

    public function galeri() {
        $berita = Berita::latest()->paginate(12);
        return GaleriResource::collection($berita);
    }

    public function show(Berita $berita) {
        $berita->increment('view_count', 1);
        return new BeritaResource($berita);
    }

    public function search(Request $request) {
        $data = $request->get('data');
        $berita = Berita::where('judul', 'like', '%' . $data . '%' )->paginate(15);

        return SearchResource::collection($berita);
    }

    public function populer() {
        $populer = Berita::orderBy('view_count', 'DESC')->paginate(3);
        return PopulerResource::collection($populer);
    }

}
