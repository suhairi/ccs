<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musim extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps  = false;
    protected $fillable    = ['musim', 'tahun', 'status'];
}
