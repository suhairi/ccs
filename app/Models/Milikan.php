<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milikan extends Model
{
    use HasFactory;

    public $timestamps  = false;
    public $fillable    = ['nama'];
}
