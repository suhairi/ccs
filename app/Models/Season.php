<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesawah;
use App\Models\Region;
use App\Models\Locality;
use App\Models\Musim;

class Season extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = ['musim', 'farmer_id', 'region_id', 'musim_id', 'phase', 'locality_id', 'noLot', 'luasLot', 'luasUsaha', 'koordinat'];



    public function farmer() {
        return $this->belongsTo(Farmer::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function locality() {
        return $this->belongsTo(Locality::class);
    }

    public function musim() {
        return $this->belongsTo(Musim::class);
    }

}
