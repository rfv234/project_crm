<?php


namespace App\Http\Controllers;


use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function news()
    {
       // dd(Auth::user(), Auth::user()->permissions->first()->rule->name);
        $news_list = \App\Models\News::query()->orderByDesc('order')->get();
        $users_list = User::query()->get();
        foreach ($news_list as $item) {
            $item->url = '/create_news?id=' . $item->id;
        }
        $news_list = json_encode($news_list);
        return view('news', [
            'news' => $news_list,
            'users' => $users_list
        ]);
    }

    public function create(Request $request)
    {
        $users = User::query()->get();
        if (isset($request->id)) {
            $new = \App\Models\News::query()->where('id', $request->id)->first();
            return view('create_news', [
                'new' => $new,
                'users' => $users
            ]);
        } else {
            return view('create_news', [
                'users' => $users
            ]);
        }
    }

    public function save(NewsRequest $request)
    {
        if (isset ($request->id)) {
            $article = News::query()->where('id', $request->id)->first();
        }
        //  dd($article, $request->all());
        if (!isset($article)) {
            $article = new News();
        }
        $article->name = $request->news_name;
        $article->text = $request->text;
        $article->author_id = $request->user;
        $article->order = $request->news_order;
        $article->save();
        return redirect('/news');
    }

    public function delete(Request $request)
    {
        $new = \App\Models\News::query()->where('id', $request->id)->delete();
        return redirect('/news');
    }

    public function showError()
    {
        return view('your_error');
    }
}