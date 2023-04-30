<?php

namespace Arktiklab\LaravelAdmin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();
        return Redirect::to(config('arktik-admin.path'));
    }
}
