<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = "tb_kategori";
    protected $primaryKey = "id_kategori";
    protected $fillable =[
        'nama_kategori',
        'deskripsi_kategori',
    ];
}
