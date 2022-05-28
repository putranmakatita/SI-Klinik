<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{
    use HasFactory;

    protected $fillable = ['tindakan_id', 'pasien_id', 'obat_id'];

    protected $with = ['tindakan', 'pasien', 'obat'];

    public function tindakan(){
        return $this->belongsTo(Tindakan::class);
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }

    public function obat(){
        return $this->belongsTo(Obat::class);
    }
}
