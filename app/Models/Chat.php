<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $casts = [
        'chat' => 'array',
        'file' => 'array'
    ];
}