<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Saran;
use Illuminate\Http\Request;
use App\Http\Resources\SaranResource;

class SaranController extends Controller
{
    public function index() {
        $saran = Saran::latest()->paginate(5);
        return SaranResource::collection($saran);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'saran' => 'required',
        ]);

        $saran = Saran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'saran' => $request->saran,
        ]);

        return new SaranResource($saran);
    }

    public function show(Saran $saran) {
        return new SaranResource($saran);
    }
}
