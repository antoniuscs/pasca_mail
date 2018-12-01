@extends('adminlte::page')

@section('content_header')
    <h1>Pengelolaan Program Pascasarjana Universitas Atma Jaya Yogyakarta</h1>
@endsection

@section('content')
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student Staff Pascasarjana Universitas Atma Jaya Yogyakarta</h3> 
                <div class="pull-right">
                <button type="button" class="btn btn-primary open_modal" data-toggle="modal" data-target="#modal-default">
                  Tambah Student Staff
                </button>
                </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NPM</th>
                  <th>Nama Lengkap</th>
                  <th>Angkatan</th>
                  <th>Program Studi</th>
                  <th>Jabatan</th>
                  <th>Divisi</th>
                  <th>Periode</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($studentstaffs))
                @foreach($studentstaffs as $value)
                <tr>
                  <td>{{ $value['npm'] }}</td>
                  <td>{{ $value['nama_lengkap'] }}</td>
                  <td>{{ $value['angkatan'] }}</td>
                  <td>{{ $value['prodi'] }}</td>
                  <td>{{ $value['jabatan'] }}</td>
                  <td>{{ $value['divisi'] }}</td>
                  <td>{{ date("M Y", strtotime($value->periode_awal)) }} - {{ date("M Y", strtotime($value->periode_akhir)) }}</td>
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
                <h4 class="modal-title">Tambah Student Staff</h4>
              </div>
              {!! Form::open(array('route' => 'studentStaff.store','method'=>'POST')) !!}
              <div class="modal-body">
                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="text" id="npm" onkeypress="return hanyaAngka(event)" maxlength="9" class="form-control" name="npm" placeholder = "NPM" required>
                  </div>

                  <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" maxlength="50" class="form-control" name="nama_lengkap" placeholder = "Nama Lengkap" required>
                  </div>

                  <div class="form-group">
                    <label for="nama_panggilan">Nama Panggilan</label>
                    <input type="text" id="nama_panggilan" maxlength="20" class="form-control" name="nama_panggilan" placeholder = "Nama Panggilan" required>
                  </div>

                  <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <select class="form-control" name="prodi" id="prodi">
                      <option value="" selected>Program Studi</option>
                      <option value="Biologi">Biologi</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Manajemen">Manajemen</option>
                      <option value="Ekonomi Pembangunan">Ekonomi Pembangunan</option>
                      <option value="Ilmu Hukum">Ilmu Hukum</option>
                      <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                      <option value="Sosiologi">Sosiologi</option>
                      <option value="Arsitektur">Arsitektur</option>
                      <option value="Teknik Sipil">Teknik Sipil</option>
                      <option value="Teknik Industri">Teknik Industri</option>
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" id="angkatan" onkeypress="return hanyaAngka(event)" maxlength="4" class="form-control" name="angkatan" placeholder = "Angkatan (Tahun)" required>
                  </div>

                  <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <select class="form-control" name="divisi" id="divisi">
                      <option value="" selected>Divisi</option>
                      <option value="Administrasi">Administrasi</option>
                      <option value="Informasi dan Promosi">Informasi dan Promosi</option>
                      <option value="Desain dan Multimedia">Desain dan Multimedia</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" name="jabatan" id="jabatan">
                      <option value="" selected>Jabatan</option>
                      <option value="Koodinator Umum">Koordinator Umum</option>
                      <option value="Wakil Koordinator Umum">Wakil Koordinator Umum</option>
                      <option value="Koordinator Bidang">Koordinator Bidang</option>
                      <option value="Anggota Bidang">Anggota Bidang</option>
                    </select>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-6">
                        <label for="periode_awal">Periode Awal</label>
                        <input type="date" class="form-control" name="periode_awal" placeholder = "Periode Awal" style="display:inline" required>
                    </div>
                    <div class="col-md-6">
                        <label for="periode_awal">Periode Akhir</label>
                        <input type="date" class="form-control" name="periode_akhir" placeholder = "Periode Akhir" required>
                    </div>
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
              {!! Form::open(['method' => 'Delete','route' => ['studentStaff.destroy', $value->id], 'style'=>'display:inline']) !!}
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
              {!! Form::model($studentstaffs, ['method' => 'PATCH', 'route' => ['studentStaff.updateStatus', $value->id], 'style'=>'display:inline']) !!}
              {!! Form::submit('Ya',['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>                
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal -->
@endsection

