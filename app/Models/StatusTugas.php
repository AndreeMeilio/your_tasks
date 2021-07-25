<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTugas extends Model
{
    use HasFactory;

    protected $table = 'statustugas';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['colorStatustugas'];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
