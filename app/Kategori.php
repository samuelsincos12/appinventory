<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kategori', 'tipe', 'jenis'];
    public $timestamps = false;

	public function scopeSee($query)
    {
    	return $query->orderBy('id', 'DESC')->paginate(10);
    }

	public function scopeEdt($query, $id)
    {
    	return $query->where('id', $id)->first();
    }       

    public function scopeAjax($query, $id)
    {
    	return $query->where("tipe", $id)->pluck('jenis');
    }
}
