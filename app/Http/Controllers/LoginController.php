<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('registration_news');
    }

    public function checkUser(Request $request)
    {
        $login = $request->name;
        $password = $request->password;
        $user = User::query()->where('name', $login)->where('password', $password)->first();
        if ($user) {
            $request->session()->regenerate();
            Auth::login($user);
            return redirect()->intended('news');
        }
        $login = $request->login;
        $password = $request->password;
        $user = User::query()->where('name', $login)->where('password', $password)->first();
        if ($user) {
            session(['user' => $user]);
            return redirect('news');
        } else {
            abort(403);
        }
    }
    public function dislogin() {
        session(['user' => null]);
        return redirect('login');
    }
}