{{-- Ambil data sesi paket --}}
@php
    $dataPaket = app('dataPaket');
    $dataTipe = app('dataTipe');
@endphp

{{-- testing --}}
{{-- @dd($dataTipe) --}}

@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div>
                        <a href="/DataSoal" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div class="me-2">
                        <span class="card-title fw-semibold">Add Question</span>
                    </div>
                    {{-- <button type="button" class="btn rounded-pill btn-outline-primary" id="addQuestion">Add Row</button> --}}
                </div>

                <form action="{{ route('DataSoal.store') }}" method="POST">
                    @csrf

                    <div class="question-fields">
                        <div class="question-template">
                            <div class="row">
                                <div class="mb-4 col-lg-12">
                                    <label for="paket" class="form-label">Input Question</label>
                                    <textarea type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp" rows="3"
                                        placeholder="Input Question....."></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Packet Question</label>
                                    <div class="">
                                        <select id="packet_id" name="packet_id" class="form-select">
                                            <option>Choice Packet Question</option>
                                            @foreach ($dataPaket['data'] as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Type Question</label>
                                    <div class="">
                                        <select id="defaultSelect" id="type_id" name="type_id" class="form-select">
                                            <option>Type Question</option>
                                            @foreach ($dataTipe['dataTipe'] as $type)
                                                <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr style="color: black; font-weight: bold">
                            <div class="row">
                                <div class="mb-4 col-lg-9">
                                    <label for="paket" class="form-label">Answer 1</label>
                                    <input type="text" class="form-control" id="answer[]" name="answer[]" aria-describedby="emailHelp" 
                                        placeholder="Input Answer 1....." />
                                </div>
                                <div class="mb-4 col-lg-3">
                                    <label for="paket" class="form-label">Is Correct</label>
                                    <div class="">
                                        <select id="defaultSelect" id="correct[]" name="correct[]" class="form-select">
                                            <option>Type Correct</option>
                                            <option value="TRUE">TRUE</option>
                                            <option value="FALSE">FALSE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-9">
                                    <label for="paket" class="form-label">Answer 2</label>
                                    <input type="text" class="form-control" id="answer[]" name="answer[]" aria-describedby="emailHelp" 
                                        placeholder="Input Answer 2....." />
                                </div>
                                <div class="mb-4 col-lg-3">
                                    <label for="paket" class="form-label">Is Correct</label>
                                    <div class="">
                                        <select id="defaultSelect" id="correct[]" name="correct[]" class="form-select">
                                            <option>Type Correct</option>
                                            <option value="TRUE">TRUE</option>
                                            <option value="FALSE">FALSE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-9">
                                    <label for="paket" class="form-label">Answer 3</label>
                                    <input type="text" class="form-control" id="answer[]" name="answer[]" aria-describedby="emailHelp" 
                                        placeholder="Input Answer 3....." />
                                </div>
                                <div class="mb-4 col-lg-3">
                                    <label for="paket" class="form-label">Is Correct</label>
                                    <div class="">
                                        <select id="defaultSelect" id="correct[]" name="correct[]" class="form-select">
                                            <option>Type Correct</option>
                                            <option value="TRUE">TRUE</option>
                                            <option value="FALSE">FALSE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-9">
                                    <label for="paket" class="form-label">Answer 4</label>
                                    <input type="text" class="form-control" id="answer[]" name="answer[]" aria-describedby="emailHelp" rows="3"
                                        placeholder="Input Answer 4....." />
                                </div>
                                <div class="mb-4 col-lg-3">
                                    <label for="paket" class="form-label">Is Correct</label>
                                    <div class="">
                                        <select id="defaultSelect" id="correct[]" name="correct[]" class="form-select">
                                            <option>Type Correct</option>
                                            <option value="TRUE">TRUE</option>
                                            <option value="FALSE">FALSE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr style="color: black; font-weight: bold">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
          document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('addQuestion').addEventListener('click', function() {
                            var questionTemplate = document.querySelector('.question-template').cloneNode(true);
                            var questionFields = document.querySelector('.question-fields');
                            questionFields.appendChild(questionTemplate);
                        });

                    });
    </script>
@endsection

