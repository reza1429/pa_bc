<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Nilai extends Model
{
    protected $collection = 'nilai';

    protected $fillable = ['lat_soal1', 'lat_soal2', 'lat_soal3', 'lat_soal4', 'uh1', 'uh2', 'uts', 'uas', 'siswa_id', 'matpel_id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class, 'matpel_id');
    }

    public function validateSiswaIdExists($attribute, $value, $parameters, $validator)
    {
        return Siswa::where('id', $value)->exists();
    }
    public function validateMatpelIdExists($attribute, $value, $parameters, $validator)
    {
        return Matpel::where('id', $value)->exists();
    }
    use HasFactory;
}
