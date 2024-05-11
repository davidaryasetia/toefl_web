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
    public function index(): string|View|Factory
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token not found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_history?select=*, users(name)');


        if ($response->successful()) {
            $data = $response->json();

            return view('HistoryTest.history', [
                'title' => 'History test',
                'data' => $data,
            ]);
        } elseif ($response->status() === 400) {
            return 'Bad Request: ' . $response['message'];
        } else {
            dd($response);
            return 'Failed Fetch Data';
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
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_history?id=eq.' . $id);


        if ($response->successful()) {
            session()->flash('success', 'Data History Test Berhasil di Hapus !!!');
            return to_route('HistoryTest.index');
        } elseif ($response->status() === 400) {
            return 'Bad Request: '. $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }
}
