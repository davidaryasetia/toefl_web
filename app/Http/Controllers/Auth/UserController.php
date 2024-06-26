<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token not found';
        }

        $idUser = session('idUser');
        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users?id=eq.' . $idUser);

        if ($response->successful()) {
            $dataUser = $response->json();

            Cache::put('userData', $dataUser, 3600);

            return view('ProfileUser.profile', [
                'title' => 'Profile User',
                'dataUser' => $dataUser,

            ]);
        } elseif ($response->status() === 400) {
            return 'Bad Request: ' . $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users?id=eq.' . $id);

        if ($response->successful()) {
            $datauser = $response->json();

            return view('ProfileUser.edit', [
                'title' => 'Edit Username',
                'datauser' => $datauser[0],
            ]);
        } else {
            return 'Failed to Fetch Data';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users?id=eq.' . $id, [
            'name' => $name,
            'email' => $email
        ]);

        if ($response->successful()) {

            $response_auth = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
                'Content-Type' => 'application/json',
            ])->put('https://vnnepnnwzlgsectnnyyc.supabase.co/auth/v1/admin/users/' . $id, [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);

            if ($response_auth->successful()) {
                session()->flash('success', 'Data Profile Successfully Updated !!!');
                return redirect('/Profile');
            } elseif ($response_auth->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response_auth['message']);
                return redirect('/Profile');
            } elseif ($response_auth->status() === 401 && $response_auth->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return redirect('/Profile');
            } else {
                return 'Error Response Here';
            }
        } elseif ($response->status() === 400) {
            return 'Bad Request: ' . $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
