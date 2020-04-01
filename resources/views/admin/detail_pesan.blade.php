@extends('home')

@section('content')
    <div class="content-wrapper p-2">
        <div class="card">
            <div class="card-header">from: <span class="font-weight-bold px-2">{{ $pesan->email }}</span></div>
            <div class="card-body">
                {{ $pesan->pesan }}
            </div>
        </div>
    </div>
@endsection
