@extends('home')

@section('content')
    <div class="content-wrapper">
       @if (count($berita) === 0)
           <h1>No result for " {{ $search }} " </h1>
       @else
            <h1>Result of " {{ $search }}"</h1>
           @foreach ($berita as $item)
                <div class="container p-3">
                    <a href="{{ route('edit', $item->id )}}"><h3>{{ $item->judul }}</h3></a>
                    <p>{{ $item->created_at->format('d M Y')}}</p>
                    <hr />
                </div>
           @endforeach
           {{ $berita->links() }}
       @endif
    </div>
@endsection
