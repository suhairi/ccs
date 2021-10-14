<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Education;

class Farmer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamps = false;    
    protected $fillable = ["nama", "nokp", "jantina", "umur", "education_id", "milikan_id", "notel", "alamat"];


    public function education() {
        return $this->belongsTo(Education::class);
    }

    public function milikan() {
        return $this->belongsTo(Milikan::class);
    }

    


}
