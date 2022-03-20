<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class Mahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $guarded = [];
    public $incrementing = false;

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tugas()
    {
        return $this->hasManyThrough(MataKuliah::class, Tugas::class);
    }

    public function notes()
    {
        return $this->hasManyThrough(MataKuliah::class, Note::class);
    }
}
