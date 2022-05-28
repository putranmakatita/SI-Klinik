<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['no_rekmed', 'jenis_kelamin', 'usia', 'user_id'];

    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function penanganan(){
        return $this->hasMany(Penanganan::class);
    }
}
