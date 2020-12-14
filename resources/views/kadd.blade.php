@extends('template')
@section('title', 'Kategori')
@section('intro-header')
  <!-- Header -->
  <header class="intro-header text-white" style="background: url('{{ asset('lav/images/about-bg.jpg') }}') no-repeat top center;">
    <div class="container text-center">
      <h1>Tambah Kategori</h1>
    </div>
  </header>
  <!-- END : Header -->
@endsection
@section('main')
  <!-- Main -->
  <section class="main">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form method="POST" action="{{ url('kategori/store') }}" role="form">
            {{ csrf_field() }}
            @if (Session::has('message'))
              <div class="col-sm-12">
                <div class="row">
                  <div class="alert alert-error alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h4 style="text-align:center">
                        <i class="icon fa fa-exclamation-circle"></i>Error!
                    </h4>
                    <p style="text-align:center">{{ session('message') }}</p>
                  </div>
                </div>
              </div>
            @endif
            <div class="form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">
              <label for="tipe">Tipe</label>
              <select class="form-control" name="tipe">
                <option value="" disabled selected>Pilih Tipe</option>
                <option value="Pemasukkan">Pemasukkan</option>
                <option value="Pengeluaran">Pengeluaran</option>
              </select>
              @if ($errors->has('tipe'))
                <span class="help-block"><strong>{{ $errors->first('tipe') }}</strong></span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
              <label for="jenis">Jenis</label>
              <input type="text" class="form-control" id="jenis" name="jenis" />
              @if ($errors->has('jenis'))
                <span class="help-block"><strong>{{ $errors->first('jenis') }}</strong></span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
        </div>
      </div>
    </div>
  </section>
  <!-- END : Main -->
@endsection
