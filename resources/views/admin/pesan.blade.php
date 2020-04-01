@extends('home')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 py-2">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pesan Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama</th>
                      <th style="width: 60%">Pesan</th>
                      <th style="width: 20%">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pesan as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>
                        <div>
                          <a href="{{ route('detail_pesan', $item->id) }}"> {{ $item->pesan }} </a>
                        </div>
                      </td>
                      <td>
                          {{ $item->created_at->format('d M Y') }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $pesan->links() }}
    </div>
@endsection
