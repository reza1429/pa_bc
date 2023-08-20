<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kelas extends Eloquent
{
    protected $collection = 'kelas';

    protected $fillable = ['kelas', 'walkel'];

    

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }

    use HasFactory;
}
