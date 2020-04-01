<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PengaduanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'email' => $this->email,
            'pengaduan' => $this->pengaduan,
            'created_at' => $this->created_at->format('d M Y, H:i'),
            'updated_at' => $this->updated_at->format('d M Y, H:i'),
        ];
    }
}
