<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
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
            'judul' => $this->judul,
            'isi' => $this->isi,
            'image_url' => $this->image_url,
            'created_at' => $this->created_at->format('d M Y, H:i'),
            'updated_at' => $this->updated_at->format('d M Y, H:i'),
            'comments' => CommentResource::collection($this->comments),
            'view_count' => $this->view_count
        ];
    }
}
