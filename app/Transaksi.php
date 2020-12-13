<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_transaksi', 'tipe', 'jenis', 'jumlah', 'desc'];
    public $timestamps = false;

    public function scopeSee($query)
    {
    	return $query->orderBy('tanggal', 'DESC')->paginate(10);
    }

    public function scopeEdt($query, $id)
    {
    	return $query->where('id', $id)->first();
    }

	public function scopeFnd($query, $from, $to)
    {
    	return $query->whereBetween('tanggal', [$from, $to])->get();
    }

    public function scopeMsk($query)
    {
    	return $query->where('tipe', 'Pemasukkan')->sum('jumlah');
    }

    public function scopeLur($query)
    {
    	return $query->where('tipe', 'Pengeluaran')->sum('jumlah');
    }    
}
