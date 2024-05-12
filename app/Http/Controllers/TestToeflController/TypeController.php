<?php

namespace App\Http\Controllers\TestToeflController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TypeController extends Controller
{
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
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/type');

        // $datatipe = $response->json();


        if ($response->successful()) {
            $dataType = $response->json();

            // kirim ke DataServiceProvider
            app()->singleton('dataTipe', function() use ($dataType){
                return $dataType;
            });

            return view('layouts.main', [
                // 'title' => 'Paket Soal',
                'dataTipe' => $dataType,
            ]);
        
        } elseif ($response->status() === 400) {
            return 'Bad Request: '. $response['message'];
        } else {
            return 'Failed Fetch Data';
        }
    }
}
