<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'matapelajaran';
    protected $primaryKey = 'idMatapelajaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['idMatapelajaran', 'idUser', 'namaMatapelajaran', 'deskripsiMatapelajaran', 'created_at', 'updated_at'];
}
