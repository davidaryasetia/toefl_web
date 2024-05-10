<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public function showLoginForm()
    {

        if (Session::has('access_token')) {
            return redirect()->route('dashboard');
        }

        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $client = new Client();
        $response = $client->post('https://vnnepnnwzlgsectnnyyc.supabase.co/auth/v1/token?grant_type=password', [
            'headers' => [
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        if ($response->getStatusCode() == 200) {
            $responseData = json_decode($response->getBody(), true);
            $token = $responseData['access_token'];

            Session::put('access_token', $token);
            return redirect()->route('dashboard');
        } elseif ($response->getStatusCode() == 400) {
            $responseData = json_decode($response->getBody(), true);
            if (isset($responseData['error']) && $responseData['error'] == "invalid_grant" && isset($responseData['error_description']) && $responseData['error_description'] == "Invalid login credentials") {
                return redirect()->back()->withInput()->withErrors(['error' => 'Email atau password tidak valid.']);
            }
        }
    }

    public function destroy()
    {
        Session::forget('access_token');
        Session::flush();
        Session::regenerate(true);
        return redirect()->route('loginForm')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
