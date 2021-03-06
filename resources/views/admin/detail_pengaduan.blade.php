@extends('home')

@section('content')
    <div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pengaduan Masyarakat</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Rincian Pengaduan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="mailbox-read-info">
                <h5>{{$pengaduan->nama}}</h5>
                  <h6>From: {{$pengaduan->email}}
                  <span class="mailbox-read-time float-right">{{ $pengaduan->created_at}} WIB</span></h6>
                </div>
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">

                  <p>{{ $pengaduan->pengaduan}}</p>
                </div>
                <!-- /.mailbox-read-message -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <a href="{{route('delete_pengaduan')}}" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</a>
                <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    </div>
@endsection
