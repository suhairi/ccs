<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey   = 'id';
    protected $fillable     = ['farmer_id', 'season_id', 'variety_id', 'method_id', 'tarikhTanam', 'tarikhJangkaTuai', 'tarikhTuaiSebenar'];

    public function pesawah() {
        return $this->belongsTo('Farmer::class');
    }

    public function season() {
        return $this->belongsTo('Season::class');
    }

    public function variety() {
        return $this->belongsTo('Variety::class');
    }

    public function method() {
        return $this->belongsTo('Method::class');
    }

    
}
