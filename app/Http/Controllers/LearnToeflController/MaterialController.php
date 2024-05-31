<?php

namespace App\Http\Controllers\LearnToeflController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $access_token = session('access_token');
        if (!$access_token) {
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        }

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material', [
            'select' => 'id, modul_id, title, content, created_at, type(id, name, created_at)',
            'order' => 'type(id)'
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return view('LearnToefl.StudyMaterials.material', [
                'title' => 'Study Matery',
                'data' => $data,
            ]);
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/StudyMaterials');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'return error response here';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('LearnToefl.StudyMaterials.create', [
            'title' => 'Tambah Materi'
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

        $modul_id = $request->input('modul_id');
        $title = $request->input('title');
        $content = $request->input('content');

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material', [
            'modul_id' => $modul_id,
            'title' => $title,
            'content' => $content,
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Data Materials Successfully Added!!!');
            return redirect('/StudyMaterials');
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/StudyMaterials');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'return error response here';
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material?', [
            'id' => 'eq.' . $id,
            'select' => 'id, modul_id, title, content, created_at, type(id, name, created_at)',
        ]);

        if ($response->successful()) {
            $data = $response->json(); //data 1
            $response_example = Http::withHeaders(([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type' => 'application/json',
            ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?', [
                'material_id' => 'eq.' . $id,
                'select' => 'id, material_id, question, url',
            ]);


            if ($response_example->successful()) {
                $data_question = $response_example->json(); // data 2
                $get_id_example_answer = $response_example->json()[0]['id']; // data 2 
                $response_answer = Http::withHeaders(([
                    'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                    'Authorization' => 'Bearer ' . $access_token,
                    'Content-Type' => 'application/json',
                ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_answer?',  [
                    'example_id' => 'eq.' . $get_id_example_answer,
                    'select' => 'id, example_id, answer, value, created_at',
                ]);

                if ($response_answer->successful()) {
                    $data_answer = $response_answer->json(); // data 3

                    return view('LearnToefl.StudyMaterials.show', [
                        'title' => 'Show Question Packet',
                        'data' => $data, // data material
                        'data_question' => $data_question, // data_question
                        'data_answer' => $data_answer, // data_answer
                    ]);
                }
            } elseif ($response->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response['message']);
                return redirect('/StudyMaterials');
            } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return redirect('/');
            } else {
                return 'return error response here';
            }
        }
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
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material?id=eq.' . $id);

        if ($response->successful()) {
            $data = $response->json();

            return view('LearnToefl.StudyMaterials.edit', [
                'title' => 'Edit Material',
                'material' => $data[0],
            ]);
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/StudyMaterials');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'Error Response Here';
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

        $modul_id = $request->input('modul_id');
        $title = $request->input('title');
        $content = $request->input('content');

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material?id=eq.' . $id, [
            'modul_id' => $modul_id,
            'title' => $title,
            'content' => $content,
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Data Materials Successfully Updated!!!');
            return redirect('/StudyMaterials');
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/StudyMaterials');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'return error response here';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            $access_token = session('access_token');
            if (!$access_token) {
                return 'Access Token Not Found';
            }

            $response = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type' => 'application/json',
            ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material?id=eq.' . $id);


            if ($response->successful()) {
                session()->flash('success', 'Data Material Successfully Delete!!!');
                return redirect('/StudyMaterials');
            } elseif ($response->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response['message']);
                return redirect('/StudyMaterials');
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
