@extends('home')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div>
                @if(session()->get('success'))
                <div class="alert alert-success alert-dismissable">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
                @endif
            </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Saran  & Masukkan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 55%">
                                Judul
                            </th>
                            <th style="width: 15%">
                                Tanggal
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saran as $item)
                        <tr>
                            <td>
                                {{ $loop->iteration}}
                            </td>
                            <td>
                                <small>
                                   {{ Str::limit($item->saran, 80)}}
                                </small>
                            </td>
                            <td>
                                <small>{{ $item->created_at}}</small>
                            </td>
                            <td class="text-right pl-3">
                            <a class="btn btn-primary btn-sm" href="{{ route('detail_saran', $item->id )}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route('delete_saran') }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Remove
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div>

              </div>
              <div class="card-footer">
                {{ $saran->links() }}
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
