<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataKuliah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "mata_kuliah";
    protected $primaryKey = "kode_matkul";
    public $incrementing = false;

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
