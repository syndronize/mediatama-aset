<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetModel extends Model
{
    protected $table = "tb_aset";
    protected $primaryKey = "id_aset";
    protected $fillable =[
        'id_kategori',
        'id_user',
        'nama_aset',
        'deskripsi_aset',
    ];
}
