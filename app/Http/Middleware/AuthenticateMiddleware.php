<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('access_token')) {
            return redirect()->route('loginForm')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        }

        if (!$request->session()->has('access_token')) {
            return $this->preventBackButton();
        }
        return $next($request);
    }
    private function preventBackButton()
    {
        return response()
            ->view('auth.login')
            ->header('Cache-Control', 'no-cache', 'must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
