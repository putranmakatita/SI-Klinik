<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_obat', 'jenis', 'usia', 'tanggal_kadaluarsa'];

    public function penanganan(){
        return $this->hasMany(Penanganan::class);
    }
}
