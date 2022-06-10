<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = [
        'uni_name', 'uni_email', 'uni_desc','uni_address','uni_contact','uni_alternate_contact','uni_image',
    ];
}
