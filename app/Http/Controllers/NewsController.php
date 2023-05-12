<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;

class NewsController extends Model
{
    public function news()
    {
        return view(';news');
    }
}