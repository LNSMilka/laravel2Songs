<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'bands';
    protected $fillable = ['name', 'genre', 'founded'];

    public function albums()
    {
        return $this->hasMany(Album::class, 'band_id');
    }
}
