@extends('template')
@section('title', 'Kategori')
@section('intro-header')
  <!-- Header -->
  <header class="intro-header text-white" style="background: url('{{ asset('lav/images/about-bg.jpg') }}') no-repeat top center;">
    <div class="container text-center">
      <h1>Kategori</h1>
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
          <a href="{{ url('/kategori/add') }}" class="btn btn-primary">Tambah</a>
          <br/><br/>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tipe</th>
                <th>Jenis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $i => $d)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $d->tipe }}</td>
                <td>{{ $d->jenis }}</td>
                <td>
                  <a href="{{ url('/kategori/edit', $d->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ url('/kategori/hapus', $d->id) }}" class="btn btn-danger">Hapus</a>
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