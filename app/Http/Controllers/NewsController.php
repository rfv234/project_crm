<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Model
{
    public function news()
    {
        $news_list = \App\Models\News::query()->orderBy('order')->get();
        $news_list = json_encode($news_list);
        return view('news', [
            'news' => $news_list
        ]);
    }
    public function create()
    {
        return view('create_news');
    }
    public function save(Request $request)
    {

    }
}