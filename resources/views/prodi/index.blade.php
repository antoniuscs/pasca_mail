@extends('adminlte::page')

@section('content_header')
    <h1>Pengelolaan Program Pascasarjana Universitas Atma Jaya Yogyakarta</h1>
@endsection

@section('content')
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Program Studi Pascasarjana Universitas Atma Jaya Yogyakarta</h3> 
                <div class="pull-right">
                <button type="button" class="btn btn-primary open_modal" data-toggle="modal" data-target="#modal-default">
                  Tambah Program Studi
                </button>
                </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Program Studi</th>
                  <th>Inisial Program Studi</th>
                  <th>Nama Program Studi</th>                  
                  <th>Ketua Program Studi</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($prodis))
                @foreach($prodis as $value)
                <tr>
                  <td>{{ $value['kode_prodi'] }}</td>
                  <td>{{ $value['inisial_prodi'] }}</td>
                  <td>{{ $value['nama_prodi'] }}</td>                  
                  <td>{{ $value['kaprodi'] }}</td>
                  <td>{{ $value['status'] == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                  <td width="200">
                    <a href="{{ route('prodi.edit', $value['id']) }}" class="btn btn-warning btn-xs">Ubah</a>
                    <button class="btn btn-primary btn-xs nonaktifbtn"
											data-title="NonAktif" data-toggle="modal"
											data-target="#nonaktifmodal">
											Non-Aktif
										</button>

                    <button class="btn btn-danger btn-xs deletebtn"
											data-title="Delete" data-toggle="modal"
											data-target="#deletemodal">
											Hapus
										</button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td align="center" colspan="5">Data Kosong</td>
                </tr>
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        <!-- /.modal-tambah-data -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Program Studi</h4>
              </div>
              {!! Form::open(array('route' => 'prodi.store','method'=>'POST')) !!}
              <div class="modal-body">
                  <div class="form-group">
                    <label for="kode_prodi">Kode Program Studi</label>
                    <input type="text" id="kode_prodi" onkeypress="return hanyaAngka(event)" maxlength="3" class="form-control" name="kode_prodi" placeholder = "Kode Program Studi" required>
                  </div>

                  <div class="form-group">
                    <label for="nama_prodi">Nama Program Studi</label>
                    <input type="text" id="nama_prodi" maxlength="50" class="form-control" name="nama_prodi" placeholder = "Nama Program Studi" required>
                  </div>

                  <div class="form-group">
                    <label for="inisial_prodi">Inisial Program Studi</label>
                    <input type="text" id="inisial_prodi" maxlength="3" class="form-control" name="inisial_prodi" placeholder = "Inisial Program Studi" required>
                  </div>

                  <div class="form-group">
                    <label for="kaprodi">Ketua Program Studi</label>
                    <input type="text" id="kaprodi" class="form-control" name="kaprodi" placeholder = "Ketua Program Studi" required>
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                      <option value="1" selected>Aktif</option>
                      <option value="0">Non Aktif</option>
                    </select>
                    <input type="hidden" id="status" name="status" value="1">
                  </div>
                   
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /.modal-hapus-data -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog"
          aria-labelledby="delete" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                  aria-hidden="true">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">Hapus Data</h4>
              </div>
              <div class="modal-body">

                <div class="alert alert-danger">
                  <span class="glyphicon glyphicon-warning-sign"></span> Apakah Anda yakin ingin menghapus data ini?
                </div>

              </div>
              <div class="modal-footer ">
              {!! Form::open(['method' => 'Delete','route' => ['prodi.destroy', $value->id], 'style'=>'display:inline']) !!}
              {!! Form::submit('Ya',['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}                
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal -->

        <!-- /.modal-non-aktif-data -->
        <div class="modal fade" id="nonaktifmodal" tabindex="-1" role="dialog"
          aria-labelledby="delete" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                  aria-hidden="true">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">Non Aktif Data</h4>
              </div>
              <div class="modal-body">
                <div class="alert alert-warning">
                   Apakah Anda yakin ingin menon-aktifkan data ini?
                </div>
              </div>
              <div class="modal-footer ">
              {!! Form::model($prodis, ['method' => 'PATCH', 'route' => ['prodi.updateStatus', $value->id], 'style'=>'display:inline']) !!}
              {!! Form::submit('Ya',['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>                
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal -->
@endsection

