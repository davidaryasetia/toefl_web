<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public function destroy()
    {
        Cookie::forget('access_token');

        return redirect()->route('loginForm');
    }   
}

