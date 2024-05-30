<?php

namespace App\Http\Controllers\LearnToeflController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LearnQuestionController extends Controller
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

        // $packet_id = request()->input('packet_id');
        // $type_id = request()->input('type_id');

        // $query = [
        //     'select' => 'id,question,type_id,packet_id,type(id,name),test_packet(id,name)',
        // ];

        // if ($packet_id) {
        //     $query['packet_id'] = 'eq.' . $packet_id;
        // }

        // if ($type_id) {
        //     $query['type_id'] = 'eq.' . $type_id;
        // }


        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?', [
            'select' => 'id, material_id, question, url, material(id, modul_id, title, content), example_answer(id, example_id, answer, value)', 
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return view('LearnToefl.LearnQuestion.question', [
                'title' => 'Data Learn Question',
                'data' => $data,
                // 'packet_id' => $packet_id,
                // 'type_id' => $type_id
            ]);
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/LearnQuestion');
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
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}