<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Locality extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = ['code', 'nama', 'namapenuh', 'region_id'];


    public function region() {
        return $this->belongsTo(Region::class);
    }
}
