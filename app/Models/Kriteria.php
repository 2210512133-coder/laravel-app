<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'type',
        'description',
        'weight',
    ];

    /**
     * bobot already included in this table, so additional helper can be added
     */
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}
