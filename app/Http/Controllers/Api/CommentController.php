<?php

namespace App\Http\Controllers\Api;

use App\Berita;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function store(Request $request, Berita $berita) {
        $comment = Comment::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'komen' => $request->komen,
            'berita_id' => $berita->id
        ]);
    }

    public function index() {
        $comment = Comment::orderBy('created_at', 'desc')->paginate(10);
        return CommentResource::collection($comment);
    }
}
