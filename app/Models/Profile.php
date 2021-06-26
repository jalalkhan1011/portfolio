<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'profile_image',
        'profile_banner',
        'mobile',
        'email',
        'facebook',
        'linkedin',
        'github',
        'twitter',
        'address',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
