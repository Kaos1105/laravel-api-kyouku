<?php

namespace App\Traits;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

trait MyAuthenticates
{
    use AuthenticatesUsers {
        AuthenticatesUsers::username as parentUsername;
        AuthenticatesUsers::logout as parentLogout;
    }

    public function username()
    {
        $this->parentUsername();

        return 'username';
    }

    public function logout(Request $request)
    {
        $this->parentLogout($request);

        return redirect()->route('login');
    }

    use RedirectsUsers {
        RedirectsUsers::redirectPath as parentRedirectPath;
    }

    public function redirectPath()
    {
        return '/users';
    }
}