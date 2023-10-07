<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $user = session('user');
        if (!$user) {
            return route('login');
        }
//        else {
//            return redirect(url()->previous());
//        }
//        if ($user) {
//            return route('news');
//        }
    }
}
