@extends('home')

@section('content')
    <div class="content-wrapper">
        @foreach ($berita as $item)
            {{ $item->judul }}
        @endforeach
    </div>
@endsection
