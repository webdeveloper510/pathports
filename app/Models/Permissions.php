<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'description',
        'status',
    ];
    const DELETED      =   0;
    const ACTIVE       =   1;

    // PERMISSIONS DEFINED
    const VIEWUNIVERSITY                   =   1;
    const CREATEDELETEUNIVERSITY           =   2;
    const EDITGROUP                   =   3;
    const VIEWCOMPANY                 =   4;
    
}
