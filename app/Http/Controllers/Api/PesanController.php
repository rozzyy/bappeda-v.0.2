<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pesan;
use Illuminate\Http\Request;
use App\Http\Resources\PesanResource;

class PesanController extends Controller
{
    public function index() {
        $pesan = Pesan::get();
        return PesanResource::collection($pesan);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ]);

        $pesan = Pesan::create([
            'nama' => $request->get('nama'),
            'email' => $request->get('email'),
            'pesan' => $request->get('pesan'),
        ]);

        return new PesanResource($pesan);
    }
}
