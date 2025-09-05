<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = ['name', 'year', 'times_sold', 'band_id'];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'album_song');
    }

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
