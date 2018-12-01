@extends('adminlte::page')

@section('content_header')
    <h1>Pengelolaan Program Pascasarjana Universitas Atma Jaya Yogyakarta</h1>
@endsection

@section('content')
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Data Program Studi</h3> 
                <div class="pull-right">
                <a href="{{ route('prodi.index') }}" class="btn btn-warning btn-s">
                <i class="glyphicon glyphicon-chevron-left"></i>
                    Kembali ke Pengelolaan</a>
                </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::model($prodis, ['method' => 'PATCH', 'route' => ['prodi.update', $prodis->id]]) !!}
                  <div class="form-group">
                    <label for="kode_prodi">Kode Program Studi</label>
                    <input type="text" id="kode_prodi" onkeypress="return hanyaAngka(event)" maxlength="3" class="form-control" name="kode_prodi" value="{{ $prodis['kode_prodi'] }}" required>
                  </div>

                  <div class="form-group">
                    <label for="nama_prodi">Nama Program Studi</label>
                    <input type="text" id="nama_prodi" maxlength="50" class="form-control" name="nama_prodi" value="{{ $prodis['nama_prodi'] }}" required>
                  </div>

                  <div class="form-group">
                    <label for="inisial_prodi">Inisial Program Studi</label>
                    <input type="text" id="inisial_prodi" maxlength="3" class="form-control" name="inisial_prodi" value="{{ $prodis['inisial_prodi'] }}" required>
                  </div>

                  <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Non Aktif</option>
                  </select>
                  </div>              
              <div class="modal-footer">
                <input type="submit" name="edit" value="Simpan" class="btn btn-primary">
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@endsection
