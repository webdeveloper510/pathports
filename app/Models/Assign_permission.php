<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_permission extends Model
{
    use HasFactory;
     protected $fillable = [
        'role_id', 
        'permission_id',
        'status',
    ];
     const DELETED      =   0;
    const ACTIVE       =   1;
}
