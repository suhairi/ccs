<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey   = 'id';
    protected $fillable     = ['pesawah_id', 'season_id', 'varieti', 'kaedah', 'tarikhTanam', 'tarikhJangkaTuai', 'tarikhTuaiSebenar'];

    public function pesawah() {
        return $this->belongsTo('Pesawah::class');
    }

    public function season() {
        return $this->belongsTo('Season::class');
    }
}
