<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesawah;
use App\Models\Region;
use App\Models\Locality;

class Season extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = ['musim', 'season_id', 'pesawah_id', 'region_id', 'phase', 'locality_id', 'noLot', 'luasLot', 'luasUsaha', 'koordinat'];



    public function pesawah() {
        return $this->belongsTo(Pesawah::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function locality() {
        return $this->belongsTo(Locality::class);
    }


}
