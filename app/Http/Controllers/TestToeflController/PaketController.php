<?php

namespace App\Http\Controllers\TestToeflController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaketController extends Controller
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

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet?select=id,name');

        if ($response->successful()) {
            $data = $response->json();

            return view('TestToefl.PaketSoal.paket', [
                'title' => 'Paket Soal',
                'data' => $data,
            ]);
        } elseif ($response->status() === 400) {
            return 'Bad Request: '. $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TestToefl.PaketSoal.create', [
            'title' => 'Tambah Paket'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $access_token = session('access_token');
        if(!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet', [
            'name' => $request->input('paket'),
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Data Paket Berhasil di Tambahkan !!!');
            return redirect('/PaketSoal');
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return back();
        } else {
            session()->flash('error', 'Failed Sumbmit Data');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $access_token = session('access_token');
        if(!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet?id=eq.' . $id);

        if ($response->successful()) {
            $data = $response->json();

            return view('TestToefl.PaketSoal.edit', [
                'title' => 'Show Paket Soal',
                'paket' => $data[0],
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
        if(!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet?id=eq.' . $id, [
            'name' => $request->input('paket'),
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Data Paket Berhasil di Update !!!');
            return redirect('/PaketSoal');
        } elseif ($response->status() === 400) {
            return 'Bad Request: '. $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $access_token = session('access_token');
        if(!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet?id=eq.' . $id);


        if ($response->successful()) {
            session()->flash('success', 'Data Paket Soal Berhasil di Hapus !!!');
            return redirect('/PaketSoal');
        } elseif ($response->status() === 400) {
            return 'Bad Request: '. $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }
}
