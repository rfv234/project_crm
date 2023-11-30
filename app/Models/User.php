<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (User $user) {
            $user->permissions()->delete();
        });
        static::created(function (User $user) {
            // ...
        });
        static::updated(function (User $user) {
            // ...
        });
        static::deleted(function (User $user) {
            $user->permissions()->delete();
        });
    }
    public function scopeSearch($query) {
        return $query->where('id', '<>', 1);
    }
}
