<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [
        'season_id', 
        'sebatian1', 
        'sebatian2', 
        'sebatian1Date', 
        'sebatian2Date', 
        'urea1', 
        'urea2', 
        'urea1Date', 
        'urea2Date', 
        'tambahan1', 
        'tambahan2',
        'tambahan1Date',
        'tambahan2Date',
        'lain1',
        'lain2',
        'lain1Date',
        'lain2Date'
    ];

    public function season() {
        return $this.belongsTo(Season::class);
    }
}
