<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    public $incrementing = false;
    protected $keyType = 'string';

    public function statustugas()
    {
        return $this->belongsTo(Status::class);
    }
}
