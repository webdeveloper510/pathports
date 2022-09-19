<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'meeting_title', 
        'meeting_description', 
        'from_user_id',
        'to_user_id',
        'university_id',
        'timezone',
        'start_date_time',
        'end_date_time',
        'meeting_url',
        'agenda_id',
        'status',
    ];
}
