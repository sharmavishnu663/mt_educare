<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCount extends Authenticatable
{
    protected $table = 'usercounts';
    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = [
        'website_user', 'page_views', 'website_video', 'youtube_subscriber', 'youtube_video', 'social_followers'
    ];
}
