<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['alamat', 'no_telp', 'jabatan', 'user_id'];

    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
