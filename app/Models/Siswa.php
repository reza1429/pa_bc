<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Siswa extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'siswa';

    protected $fillable = ['nama', 'nisn', 'alamat', 'jk', 'no_telp', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // public function nilai()
    // {
    //     return $this->belongsTo(Nilai::class, 'id', 'siswa_id');
    // }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }
    use HasFactory;
}
