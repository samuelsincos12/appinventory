@extends('template')
@section('title', 'Kategori')
@section('intro-header')
  <!-- Header -->
  <header class="intro-header text-white" style="background: url('{{ asset('lav/images/about-bg.jpg') }}') no-repeat top center;">
    <div class="container text-center">
      <h1>Edit Transaksi</h1>
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
          <form method="POST" action="{{ url('transaksi/update', $data->id) }}" role="form">
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
              <select class="form-control" name="tipe" id="tipe">
                <option value="" disabled selected>Pilih Tipe</option>
                <option value="Pemasukkan" {{ $data->tipe == 'Pemasukkan' ? 'selected' : '' }}>Pemasukkan</option>
                <option value="Pengeluaran" {{ $data->tipe == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
              </select>
              @if ($errors->has('tipe'))
                <span class="help-block"><strong>{{ $errors->first('tipe') }}</strong></span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
              <label for="jenis">Jenis</label>
              <select class="form-control" name="jenis" id="jenis">
                <option value="{{ $data->jenis }}">{{ $data->jenis }}</option>
              </select>
              @if ($errors->has('jenis'))
                <span class="help-block">
                  <strong>{{ $errors->first('jenis') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
              <label for="jumlah">Nominal</label>
              <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $data->jumlah) }}" />
              @if ($errors->has('jumlah'))
                <span class="help-block">
                  <strong>{{ $errors->first('jumlah') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              <label for="desc">Deskripsi</label>
              <textarea class="form-control" rows="5" id="desc" name="desc" value="{{ old('desc', $data->desc) }}"></textarea>
              @if ($errors->has('desc'))
                <span class="help-block">
                  <strong>{{ $errors->first('desc') }}</strong>
                </span>
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
