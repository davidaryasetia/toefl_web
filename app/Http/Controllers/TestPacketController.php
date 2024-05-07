<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\TestPacket;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestPacketController extends Controller
{
    public function index()
   {

    return view('test_packet.index', [
        'title' => 'Test Packet', 
        'packet' => TestPacket::orderBy('id')
    ]);
   }

    public function store(Request $request)
    {
        $client = new Client();
        
        try {
            $response = $client->request('POST', 'https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/test_packet', [
                'headers' => [
                    'Authorization' =>'bearer eyJhbGciOiJIUzI1NiIsImtpZCI6ImJleVZkaW5XeEdJYzI4TW0iLCJ0eXAiOiJKV1QifQ.eyJhdWQiOiJhdXRoZW50aWNhdGVkIiwiZXhwIjoxNzE1MDQ5MTQ2LCJpYXQiOjE3MTUwNDU1NDYsImlzcyI6Imh0dHBzOi8vdm5uZXBubnd6bGdzZWN0bm55eWMuc3VwYWJhc2UuY28vYXV0aC92MSIsInN1YiI6IjE3ZDkwYWEzLTM2MTYtNDgwMC05NGJmLTQ1NjZmZjBhOGQ5ZiIsImVtYWlsIjoidGVzdGluZ0BnbWFpbC5jb20iLCJwaG9uZSI6IiIsImFwcF9tZXRhZGF0YSI6eyJwcm92aWRlciI6ImVtYWlsIiwicHJvdmlkZXJzIjpbImVtYWlsIl19LCJ1c2VyX21ldGFkYXRhIjp7ImVtYWlsIjoidGVzdGluZ0BnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6ZmFsc2UsInBob25lX3ZlcmlmaWVkIjpmYWxzZSwic3ViIjoiMTdkOTBhYTMtMzYxNi00ODAwLTk0YmYtNDU2NmZmMGE4ZDlmIn0sInJvbGUiOiJhdXRoZW50aWNhdGVkIiwiYWFsIjoiYWFsMSIsImFtciI6W3sibWV0aG9kIjoicGFzc3dvcmQiLCJ0aW1lc3RhbXAiOjE3MTUwNDU1NDZ9XSwic2Vzc2lvbl9pZCI6IjQwNDE3YTdmLTYxMWUtNDliZS1iNDRjLTNkZDg5YjJjNjU3NSIsImlzX2Fub255bW91cyI6ZmFsc2V9.9xbl3OH3oTl85nFAci5Jo5Efkn1wILxLEv0v3KPwnmQ',
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
