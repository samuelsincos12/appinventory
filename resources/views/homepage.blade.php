@extends('template')
@section('title', 'Home')
 
@section('intro-header')
  <!-- Header -->
  <header class="intro-header text-white" style="background: url('{{ asset('lav/images/home-bg.jpg') }}') no-repeat bottom center;">
    <div class="container text-center">
      <h1>Aplikasi Inventory</h1>
      <p class="lead">Aplikasi Pencatatan Pengeluaran dan Pemasukkan Keuangan Berbasis Web</p>
    </div>
  </header>
  <!-- END : Header -->
@endsection
 
@section('main')
    <!-- Main -->
    <section class="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>Rp {{ $data['saldo'] }}</h2>
            <p>Saldo Saat ini</p>
          </div>
          <div class="col-md-4">
            <h2>Rp {{ $data['in'] }}</h2>
            <p>Jumlah Pemasukkan</p>
          </div>
          <div class="col-md-4">
            <h2>Rp {{ $data['out'] }}</h2>
            <p>Jumlah Pengeluaran</p>
          </div>
        </div>
      </div>
    </section>
    <!-- END : Main -->
@endsection