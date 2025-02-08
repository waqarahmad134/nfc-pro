<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
        'cover_pic',
        'email',
        'code_id',
        'email_verified_at'
    ];
}
