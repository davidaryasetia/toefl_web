<?php

namespace App\Http\Controllers\TestToeflController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $access_token = session('access_token');
        
        if (!$access_token){
            return 'Access Token not found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_question?', [
            'select' => 'id,question,type_id,packet_id,type(id,name),test_packet(id,name)'
        ]);

        if ($response->successful()){
            $data = $response->json();

            return view('TestToefl.DataSoal.soal',[
                'title' => 'Data Master Soal',
                'data' => $data,
            ]);
        } elseif ($response->status() === 400){
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
        return view('TestToefl.DataSoal.create',[
            'title' => 'Tambah Soal'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $access_token = session('access_token');
        if(!$access_token){
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY', 
            'Authorization' => 'Bearer ' . $access_token, 
            'Content-Type' => 'application/json', 
        ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_question',[
            'question' => $request->input('question'), 
            'type_id' => $request->input('type_id'), 
            'packet_id' => $request->input('packet_id'), 
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Data Paket Berhasil di Tambahkan !!!');
            return redirect('/DataSoal');
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return back();
        } else {
            session()->flash('error', 'Failed Sumbmit Data');
            return redirect('/DataSoal');
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
        if(!$access_token){
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY', 
            'Authorization' => 'Bearer ' . $access_token, 
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_question?id=eq.' . $id);

            if($response->successful()){
                $data = $response->json();

                return view('TestToefl.DataSoal.edit', [
                    'title' => 'Edit Soal', 
                    'DataSoal' => $data[0],
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
        if(!$access_token){
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY', 
            'Authorization' => 'Bearer ' . $access_token, 
            'Content-Type' => 'application/json', 
        ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_question?id=eq.' . $id, [
            'question' => $request->input('question'), 
            'packet_id' => $request->input('packet_id'), 
            'type_id' => $request->input('type_id'),
        ]);

        if($response->successful()){
            session()->flash('success', 'Data Paket Berhasil di Update');
            return redirect('/DataSoal');
        } elseif ($response->status() === 400){
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
        $access_token = session('access_token');
        if(!$access_token){
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token, 
            'Content-Type' => 'application/json',
        ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_question?id=eq.' . $id);

        if ($response->successful()){
            session()->flash('success', 'Data Soal Berhasil di Hapus');
            return redirect('/DataSoal');
        } elseif ($response->status() === 400){
            return 'Bad Request: ' . $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }
}
