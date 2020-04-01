@extends('home')

@section('content')
     <!-- Content Wrapper. Contains page content -->
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
            <h1>Pengumuman</h1>
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
              <div class="card-header">
                <h3 class="card-title"><a href="{{ route("add_pengumuman") }}" class="btn btn-primary font-weight-bold"><i class="fa fa-plus"></i> Pengumuman</a></h3>
              </div>
              <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 40%">
                                Judul
                            </th>
                            <th style="width: 15%">
                                Tanggal Dibuat
                            </th>
                            <th style="width: 15%">
                                Tanggal Update
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumuman as $item)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <small>
                                   {{ $item->judul }}
                                </small>
                            </td>
                            <td>
                               <small>{{$item->created_at}}</small>
                            </td>
                            <td class="project_progress">
                               <small> {{$item->updated_at}}</small>
                            </td>
                            <td class="text-right pl-3">
                            <a class="btn btn-info btn-sm" href="{{ route('edit_pengumuman', $item->id ) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route('hapus_pengumuman') }}">
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
                {{ $pengumuman->links() }}
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
