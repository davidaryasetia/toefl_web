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

    public function create_question(string $id)
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
            'select' => 'id, modul_id, title', 
            'id' => 'eq.' . $id
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return view('LearnToefl.StudyMaterials.create_question', [
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

    public function store_question(Request $request)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $material_id = $request->input('material_id');
        $question = $request->input('question');
        $pembahasan = $request->input('pembahasan');


        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question', [
            'material_id' => $material_id,
            'question' => $question, 
            'pembahasan' => $pembahasan, 
        ]);

        if ($response->successful()) {
            $response_answer_id = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type' => 'application/json',
            ])->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?select=id&order=id.desc&limit=1');

            if ($response_answer_id->successful()) {
                $last_id = $response_answer_id->json()[0]['id'];
                $answers = $request->input('answer');
                $corrects = $request->input('value');

                foreach ($answers as $index => $answer) {
                    $isCorrect = $corrects[$index];
                    $insert_answer = Http::withHeaders([
                        'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                        'Authorization' => 'Bearer ' . $access_token,
                        'Content-Type' => 'application/json',
                    ])->post('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_answer', [
                        'example_id' => $last_id,
                        'answer' => $answer,
                        'value' => $isCorrect,
                    ]);

                    if (!$insert_answer->successful()) {
                        session()->flash('error', 'Failed to insert answer : ' . $insert_answer->body());
                        return back();
                    }
                }
                // If Success
                if ($insert_answer->successful()) {
                    session()->flash('success', 'Data Packet Successfully Addedd !!!');
                    return redirect('/StudyMaterials/show_question/'. $material_id);
                } elseif ($response->status() === 400) {
                    session()->flash('error', 'Bad Request : ' . $response['message']);
                    return back();
                } else {
                    session()->flash('error', 'Failed Sumbmit Data');
                    return back();
                }
            }
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
            'select' => 'id,modul_id,title,content,type(id,name)',
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $data_example_answer_id = $response->json()[0]['id']; //data 1
            $response_example_answer = Http::withHeaders(([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type' => 'application/json',
            ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?', [
                'material_id' => 'eq.' . $data_example_answer_id,
                'select' => 'id, material_id, question, url, created_at, pembahasan, example_answer(id, example_id, answer, value)' 
            ]);

            if ($response_example_answer->successful()) {
                $data_example_answer = $response_example_answer->json(); // data 2
                return view('LearnToefl.StudyMaterials.show', [
                    'title' => 'Show Question Packet',
                    'data' => $data, // data material
                    'data_example_answer' => $data_example_answer, // data_answer
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
        } else {
            return 'in parentss disini';
        }
    }

    public function show_question(string $id)
    { 
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        // response material
        $response_id_material = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/material?', [
            'id' => 'eq.' . $id,
            'select' => 'id, modul_id, title, content'
        ]);

        // response example
        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?', [
            'material_id' => 'eq.' . $id,
            'select' => 'id, material_id, question, url, created_at, pembahasan, material(id, modul_id, title, content)'
        ]);


        if ($response->successful()) {
            $data = $response->json();
            $data_id_material = $response_id_material->json()[0]['id'];

            return view('LearnToefl.StudyMaterials.show_question', [
                'title' => 'Show Question Packet',
                'data' => $data,
                'data_material' => $data_id_material, 
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

    public function show_detail_question(string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?', [
            'id' => 'eq.' . $id,
            'select' => 'id, material_id, question, url, created_at, pembahasan, material(id, modul_id, title, content), example_answer(id, example_id, answer, value)'
        ]);


        if ($response->successful()) {
            $data = $response->json();
            $data_answer = $response->json()[0]['example_answer'];
        
            return view('LearnToefl.StudyMaterials.show_detail_question', [
                'title' => 'Show Question Packet',
                'data' => $data,
                'data_answer' => $data_answer, 
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

    public function edit_detail_question(string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }

        $response = Http::withHeaders(([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ]))->get('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?', [
            'id' => 'eq.' . $id,
            'select' => 'id, material_id, question, url, created_at, pembahasan, material(id, modul_id, title, content), example_answer(id, example_id, answer, value)'
        ]);


        if ($response->successful()) {
            $data = $response->json();
            $data_answer = $response->json()[0]['example_answer'];
        
            return view('LearnToefl.StudyMaterials.edit_detail_question', [
                'title' => 'Show Question Packet',
                'data' => $data,
                'data_answer' => $data_answer, 
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

    public function update_detail_question(Request $request, string $id)
    {
        $access_token = session('access_token');
        if (!$access_token) {
            return 'Access Token Not Found';
        }
        $material_id = $request->input('material_id');

        $response = Http::withHeaders([
            'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?id=eq.' . $id, [
            'question' => $request->input('question'),
            'pembahasan' => $request->input('pembahasan'),
        ]);

        if ($response->successful()) {
            $answers_id = $request->input('answer_id');
            $answers = $request->input('answer');
            $corrects = $request->input('value');

            // var_dump($answers_id);
            // var_dump($answers);
            // var_dump($corrects);
            // if (is_null($answers_id) || is_null($answers) || is_null($corrects)) {
            //     return response()->json(['error' => 'Invalid input'], 400);
            // }

            foreach ($answers_id as $index => $id) {
                $answer = $answers[$index];
                $correct = $corrects[$index];

                $update_answer = Http::withHeaders([
                    'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                    'Authorization' => 'Bearer ' . $access_token,
                    'Content-Type' => 'application/json',
                ])->patch('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_answer?id=eq.' . $id, [
                    'answer' => $answer,
                    'value' => $correct,
                ]);
            }

            if ($update_answer->successful()) {
                session()->flash('success', 'Data Question Successfully Update !!!');
                return redirect('/StudyMaterials/show_question/'. $material_id);
            } elseif ($update_answer->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response['message']);
                return redirect('/DataSoal');
            } elseif ($update_answer->status() === 401 && $response->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return redirect('/');
            } else {
                return 'Error Response Here';
            }
        } elseif ($response->status() === 400) {
            session()->flash('error', 'Bad Request : ' . $response['message']);
            return redirect('/DataSoal');
        } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
            session()->forget('access_token');
            session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
            return redirect('/');
        } else {
            return 'Error Response Here';
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


    public function destroy_question(string $id)
    {
        $access_token = session('access_token');
            if (!$access_token) {
                return 'Access Token Not Found';
            }

            $response = Http::withHeaders([
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InZubmVwbm53emxnc2VjdG5ueXljIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTQzNjIxOTAsImV4cCI6MjAyOTkzODE5MH0.IyrWPJ5CbV4wk1Q0sUwqN9Rpdt95IRJ8WQ_-BNS6gmY',
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type' => 'application/json',
            ])->delete('https://vnnepnnwzlgsectnnyyc.supabase.co/rest/v1/example_question?id=eq.' . $id);


            if ($response->successful()) {
                session()->flash('success', 'Data Material Successfully Delete!!!');
                return back();
            } elseif ($response->status() === 400) {
                session()->flash('error', 'Bad Request : ' . $response['message']);
                return back();
            } elseif ($response->status() === 401 && $response->json()['message'] === 'JWT expired') {
                session()->forget('access_token');
                session()->flash('error', 'Your Session Has Been End, Please Login Again !!!');
                return back();
            } else {
                return 'Error Response Here';
            }
    }
}
