<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    public $timestamps  = false;
    public $fillable    = ['season_id', 'kategori', 'nama', 'peratus'];


    public function season() {
        return $this->belongsTo(Season::class);
    }
}
