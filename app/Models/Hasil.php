<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps  = false;
    public $fillable    = ['season_id', 'rujukan', 'hasilLot', 'hasilKgHektar'];


    public function season() {
        return $this->belongsTo(Season::class);
    }
}
