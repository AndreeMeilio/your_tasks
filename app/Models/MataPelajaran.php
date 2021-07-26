<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'matapelajaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'idUser', 'namaMatapelajaran', 'deskripsiMatapelajaran'];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
