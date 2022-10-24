<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table = 'project';

    protected $fillable = [
    'id_siswa',
    'nama_project',
    'deskripsi',
    'tanggal'  
    ];

    public function siswa(){
        return $this->belongsTo('App\Models\siswa', 'id');
    }
}
