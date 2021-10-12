<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nama'];

    public function pest() {

        return $this->belongsToMany(Pest::class);
    }
}
