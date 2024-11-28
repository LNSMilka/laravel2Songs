<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'albums';
protected $fillable = ['name', 'year', 'times_sold'];
}
