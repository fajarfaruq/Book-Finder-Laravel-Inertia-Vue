<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Login');
    }
}
