<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return string|View|Factory
     */
    public function index()
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token not found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw', 
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_history', [
            'select' => 'id, listening_score, structure_score, reading_score, user_id, users(id,name), created_at',
            'order' => 'created_at.desc', 
        ]);


        if ($response->successful()) {
            $data = $response->json();

            return view('HistoryTest.history', [
                'title' => 'History test',
                'data' => $data,
            ]);
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/HistoryTest');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'Error Response Here';
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return void
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @return void
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     * @return void
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @return void
     */
    public function edit(string $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @return void
     */
    public function update(Request $request, string $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return string|RedirectResponse
     */
    public function destroy(string $id): string|RedirectResponse
    {
        $access_token = session('access_token');
        if(!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxNDM2MjE5MCwiZXhwIjoyMDI5OTM4MTkwfQ._hV53FBRupn9t8RdAqUgEsWa_hXkZ0-e_Uc5OW9hkHw', 
            'Content-Type' => 'application/json',
        ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_history?id=eq.' . $id);


        if ($response->successful()) {
            session()->flash('success', 'Data History Test Berhasil di Hapus !!!');
            return to_route('HistoryTest.index');
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/HistoryTest');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'Error Response Here';
        }
    }
}
