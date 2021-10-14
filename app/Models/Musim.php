<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musim extends Model
{
    use HasFactory;

    public $timestamps  = false;
    public $fillable    = ['musim', 'tahun', 'status'];
}
