@extends('home')

@section('content')
<div class="content-wrapper">
    <div class="row p-3">
        <div class="col">
            <div class="card">
                <div class="card-header font-weight-bold"><h2>Apakah ingin hapus ?</h2></div>
                <div class="card-body">
                @foreach ($pengumuman as $item)
                    Judul : {{ $item->judul }}
                @endforeach
                <div>
                <form action="{{ route('delete_pengumuman', $item->id )}}" method="POST" class="py-3">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">
                       Delete
                    </button>
                    <span><a href="{{ route('pengumuman')}}" class="btn btn-info btn-sm">Cancel</a></span>
                </form>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
