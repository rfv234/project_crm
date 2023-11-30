<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected static function boot()
    {
        parent::boot();
        static::deleting(function (User $new) {
            $new->order()->delete();
        });
        static::created(function (User $user) {
            // ...
        });
        static::updated(function (User $user) {
            // ...
        });
        static::deleted(function (User $new) {
            $new->order()->delete();
        });
    }
}