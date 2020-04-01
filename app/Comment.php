<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['nama', 'email', 'komen', 'berita_id'];

    public function berita() {
        return $this->belongsTo(Berita::class);
    }
}
