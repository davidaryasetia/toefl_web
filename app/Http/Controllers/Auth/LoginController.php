<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

        if($response->getStatusCode() == 200){
            $responseData = json_decode($response->getBody(), true);
            $token = $responseData['access_token'];
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('error', 'Email atau password salah');
    }
}
