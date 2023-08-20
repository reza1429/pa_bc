<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Matpel extends Model
{
    protected $collection = 'matpel';

    protected $fillable = ['matpel'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'matpel_id');
    }

    use HasFactory;
}
