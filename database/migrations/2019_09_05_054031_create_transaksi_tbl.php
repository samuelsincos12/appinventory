<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipe');
            $table->string('jenis');
            $table->decimal('jumlah', 10, 0);
            $table->string('desc');
            $table->date("tanggal");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_transaksi');
    }
}
