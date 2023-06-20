<?php


namespace App\Http\Controllers;


use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $news_list = \App\Models\News::query()->orderBy('order')->get();
        foreach ($news_list as $item) {
            $item->url = '/create_news?id=' . $item->id;
        }
        $news_list = json_encode($news_list);
        return view('news', [
            'news' => $news_list
        ]);
    }

    public function create(Request $request)
    {
        if (isset($request->id)) {
            $new = \App\Models\News::query()->where('id', $request->id)->first();
            return view('create_news', [
                'new' => $new
            ]);
        } else {
            return view('create_news');
        }
    }

    public function save(Request $request)
    {
        $article = new News();
        $article->name = $request->news_name;
        $article->text = $request->text;
        $article->save();
        return redirect('/news');
    }
    public function delete(Request $request)
    {
        $new = \App\Models\News::query()->where('id', $request -> id)->delete();
        return redirect('/news');
    }
}