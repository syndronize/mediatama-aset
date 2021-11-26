<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaModel extends Model
{
    protected $table = "tb_pengguna";
    protected $primaryKey = "id_pengguna";
    protected $fillable =[
        'nama_pengguna',
        'username_pengguna',
        'nohp_pengguna',
        'jk_pengguna',
        'level_pengguna',
        'password_pengguna',
    ];

    public function CheckLoginPengguna($username_pengguna, $password_pengguna)
    {
        $data_pengguna = $this->where("username_pengguna", $username_pengguna)->get();
        if(count($data_pengguna) == 1){
            if(Hash::check($password_pengguna, $data_pengguna[0]->password_pengguna)){
                unset($data_pengguna[0]->password_pengguna);
                return $data_pengguna[0];
            }
        }
        return false;
    }
}
