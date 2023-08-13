<?php

namespace Arktiklab\LaravelAdmin\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Auth/Login');
    }
}
