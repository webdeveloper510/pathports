<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterestAreas extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'interest_id',
        'subcat_id',
        'user_id',
        'status',
     
    ];
    const DELETED      =   0;
    const ACTIVE       =   1;
}
