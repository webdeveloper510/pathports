<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestAreas extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcat_id', 'interest_area_name',
    ];
}
