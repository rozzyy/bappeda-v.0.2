<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'isi', 'image', 'image_url', 'created_at', 'updated_at', 'view_count'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
