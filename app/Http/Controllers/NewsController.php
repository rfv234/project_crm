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
            'users' => $users_list,
            'canupdate' => $this->getPermissions(2),
            'candelete' => $this->getPermissions(3),
            'cancreate' => $this->getPermissions(1)
        ]);
    }

    public function create(Request $request)
    {
        $users = User::query()->get();
        $data = [
            'users' => $users,
            'canupdate' => $this->getPermissions(2),
            'candelete' => $this->getPermissions(3),
            'cancreate' => $this->getPermissions(1)
        ];
        if (isset($request->id)) {
            $data ['new'] = \App\Models\News::query()->where('id', $request->id)->first();
        }
        return view('create_news', $data);
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

    public function getPermissions($rule_id, $user_id = null)
    {
        if ($user_id) {
            $user = User::query()->where('id', $user_id)->first();
        } else {
            $user = Auth::user();
        }
        $permissions = $user->permissions->pluck('rule_id')->toArray();
        return in_array($rule_id, $permissions);
    }

    public function showError()
    {
        return view('your_error');
    }

    public function users_list()
    {
        $users = User::query()->get();
        foreach ($users as $user) {
            $user->cancreate = $this->getPermissions(1, $user->id);
            $user->canupdate = $this->getPermissions(2, $user->id);
            $user->candelete = $this->getPermissions(3, $user->id);
        }
        return view('users_menu', [
            'users_list' => $users
        ]);
    }
}