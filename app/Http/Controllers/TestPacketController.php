<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestPacketController extends Controller
{
    public function index()
    {
        $client = new Client();
        
        try{
            $response = $client->request('GET', 'https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet', [
                'headers' => [
                    'Authorization' => 'JWT giAE3L3bLp4/h0h7+zrVZN7vR+06Vmrx81DrxndmtDIGlSYplQhwbx3+iY47MiqZE5M4pCDvTOWP16/ZKxnDGw==', 
                    'Content-Type' => 'application/json', 
                    'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY'
                ]
            ]);
            $data = json_decode($response->getBody(), true);
            return view('test_packet.index', ['data'=>$data]);

        } catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $client = new Client();
        
        try {
            $response = $client->request('POST', 'https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet', [
                'headers' => [
                    'Authorization' => 'JWT giAE3L3bLp4/h0h7+zrVZN7vR+06Vmrx81DrxndmtDIGlSYplQhwbx3+iY47MiqZE5M4pCDvTOWP16/ZKxnDGw==', 
                    'Content-Type' => 'application/json', 
                    'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY'
                ],
                'json' => [
                    'name' => $request->input('name')
                ]
            ]);

            return redirect()->route('test_packet.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
