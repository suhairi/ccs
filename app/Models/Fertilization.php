<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilization extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = ['season_id', 'fertilizer_id', 'kekerapan', 'tarikh', 'hlt', 'kgPerRelung', 'kgPerHektar'];

    public function season() {
        return $this->belongsTo(Season::class);
    }

    public function fertilizer() {
        return $this->belongsTo(Fertilizer::class);
    }
}
