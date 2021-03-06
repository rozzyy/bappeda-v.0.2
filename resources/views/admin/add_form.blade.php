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
        <form method="POST" action="{{ route('create') }}" role="form" enctype="multipart/form-data">
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan judul">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea class="form-control" name="isi" rows="5" placeholder="Ketik isi berita ..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Post</button>
              </div>
            </form>
          </div>
    </div>
@endsection
