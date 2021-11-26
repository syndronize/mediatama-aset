<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = "tb_project";
    protected $primaryKey = "id_project";
    protected $fillable =[
        'id_pengguna',
        'id_aset',
        'bukti_project',
        'link_project',
        'deskripsi_project',
    ];
}
