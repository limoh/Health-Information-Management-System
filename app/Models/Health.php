<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    
    protected $fillable = [
        'names',
        'facility',
        'disease',
        'symptomps_signs',
        'medication',
        'efects',
        'allergy',
        'created_at',
    ];

    public $timestamps = true;
    
}
