<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;

class HomepageController extends Model
{
    public function homepage()
    {
        return view('homepage');
    }
}