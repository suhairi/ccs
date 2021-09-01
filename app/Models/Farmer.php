<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;    
    protected $fillable = ["nama", "nokp", "jantina", "umur", "pendidikan", "milikan", "notel", "alamat"];


}
