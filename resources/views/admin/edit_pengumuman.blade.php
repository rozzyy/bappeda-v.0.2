@extends('home')

@section('content')
    <div class="content-wrapper p-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Pengumuman</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
        <form method="POST" action="{{ route('update_pengumuman', $pengumuman->id ) }}" role="form">
            @method('PATCH')
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{ $pengumuman->judul }}">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Isi</label>
                    <textarea class="form-control" name="content" rows="5">{{ $pengumuman->content }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Download</label>
                        <input type="text" class="form-control" name="download" value="{{ $pengumuman->download }}">
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
    </div>
@endsection
