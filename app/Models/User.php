<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function spots()
    {
        return $this->hasMany(Spot::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorite_spots()
    {
        return $this->hasMany(FavoriteSpot::class);
    }

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function follow()
    {
        return $this->hasMany(Follow::class);
    }

    public function favorite_words()
    {
        return $this->hasMany(FavoriteWord::class);
    }
}
