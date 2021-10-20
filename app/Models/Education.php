<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $primaryKey   = 'id';

    protected $table        = 'educations';

    public $timestamps = false;
    protected $fillable     = ['nama'];
    
}
