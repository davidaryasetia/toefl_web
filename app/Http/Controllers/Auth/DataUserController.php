<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $access_token = session('access_token');

        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users');

        if ($response->successful()) {
            $data = $response->json();

            return view('DataUser.user', [
                'title' => 'Daftar User',
                'dataUser' => $data,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataUser.create', [
            'title' => 'Tambah Data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $access_token = session('access_token');

        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $is_admin = true;

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Content-Type' => 'application/json',
        ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/auth/v1/signup', [
            'email' => $email,
            'password' => $password,
        ]);

        if ($response->successful()) {
            $response_id = $response->json()['user']['id'];
            $response_email = $response->json()['user']['email'];

            $response_users = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Authorization' => 'Bearer ' . $access_token,
                'Prefer' => 'return=minimal',
                'Content-Type' => 'application/json',
            ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users', [
                'id' => $response_id,
                'name' => $name,
                'email' => $response_email,
                'is_admin' => $is_admin,
            ]);

            if ($response_users->successful()) {
                session()->flash('success', 'Data Admin Successfully Addedd !!!!');
                return redirect('/DataUser');
            } elseif ($response->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response['message']);
                return back();
            } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return redirect('/');
            } else {
                return 'Error Response Here';
            }
        }
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
            $data = $response->json();

            return view('DataUser.edit', [
                'title' => 'Edit User',
                'datauser' => $data,
            ]);
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
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
            'Content-Type' => 'application/json',
            'Prefer' => 'return=minimal',
        ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users?id=eq.' . $id, [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'is_admin' => true,
        ]);

        if ($response->successful()) {

            $response_auth = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
                'Content-Type' => 'application/json',
            ])->put('https://vnnepnnwzlgsectnnyyc.supabase.co/auth/v1/admin/users/' . $id, [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);

            if ($response_auth->successful()) {
                session()->flash('success', 'Data Admin Successfully Updated !!!');
                return redirect('/DataUser');
            } elseif ($response_auth->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response_auth['message']);
                return redirect('/DataUser');
            } elseif ($response_auth->status() === 401 && $response_auth->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return redirect('/');
            } else {
                return 'Error Response Here';
            }
        } else {
            return 'error here';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/users?id=eq.' . $id);

        if ($response->successful()) {
            
            $response_auth_users = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw',
                'Content-Type' => 'application/json',
            ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/auth/v1/admin/users/' . $id);

            if ($response_auth_users->successful()) {
                session()->flash('success', 'Data Users Successfully Deleted !!!');
                return redirect('/DataUser');
            } elseif ($response->status() === 400) {
                return redirect('/DataUser');
            } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return redirect('/');
            } else {
                return 'Error Response Here';
            }
        }
    }
}
