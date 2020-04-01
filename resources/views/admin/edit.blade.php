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
              <h3 class="card-title">Post Berita</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
        <form method="POST" action="{{ route('update', $berita->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{ $berita->judul }}">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Isi</label>
                    <textarea class="form-control" name="isi" rows="5">{{ $berita->isi }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
                  <br />
                  <img src="{{ asset('/storage/images/' . $berita->image )}}" alt="foto" width="20%" class="border">
                  <div class="input-group py-2">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">{{ $berita->image }}</label>
                    </div>
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
