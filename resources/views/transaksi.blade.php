@extends('template')
@section('title', 'Transaksi')
 
@section('intro-header')
  <!-- Header -->
  <header class="intro-header text-white" style="background: url('{{ asset('lav/images/contact-bg.jpg') }}') no-repeat center center;">
    <div class="container text-center">
      <h1>Transaksi</h1>
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
          @if (Session::has('message'))
            <div class="col-sm-12">
              <div class="alert alert-info alert-dismissible">
                <h4 style="text-align:center"><i class="icon fa fa-check"></i>Berhasil!</h4>
                <p style="text-align:center">{{ session('message') }}</p>
              </div>
            </div>
          @endif
          <div class="col-sm-12">
            <form role="form" method="POST" action="{{ url('/search') }}">
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <div class="form-group">
                <label for="from">Dari:</label>
                <input type="date" class="form-control" id="from" name="from">
              </div>
              <div class="form-group">
                <label for="to">Ke:</label>
                <input type="date" class="form-control" id="to" name="to">    
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-info" id="cari" value="Cari">
              </div> 
            </form>
          </div>
          <br/><br/>
          <a href="{{ url('transaksi/add') }}" class="btn btn-primary">Tambah</a>
          <br/><br/>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tipe</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
               @foreach($data as $i => $d)
              <tr>
                <td>{{ $i+1}}</td>
                <td>{{ $d->tipe }}</td>
                <td>{{ $d->jenis }}</td>
                <td>{{ $d->jumlah }}</td>
                <td>{{ $d->desc }}</td>
                <td>
                  <a href="{{ url('transaksi/edit', $d->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ url('transaksi/hapus', $d->id) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- END : Main -->
@endsection