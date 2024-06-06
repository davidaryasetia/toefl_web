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
                        <a href="{{url()->previous()}}" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div class="me-2">
                        <span class="card-title fw-semibold">Edit Question In Matery : {{$data[0]['material']['title']}} </span>
                    </div>
                    {{-- <button type="button" class="btn rounded-pill btn-outline-primary" id="addQuestion">Add Row</button> --}}
                </div>

                <form action="{{ route('StudyMaterials.update_detail_question', $data[0]['id']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="question-fields">
                        <div class="question-template">
                            <input type="hidden" class="form-control" id="material_id" name="material_id" aria-describedby="emailHelp" rows="3"
                            placeholder="Input Answer 4....." value="{{$data[0]['material']['id']}}"/>
                            <div class="row">
                                <div class="mb-4 col-lg-12">
                                    <label for="paket" class="form-label">Input Question</label>
                                    <textarea type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp" rows="8"
                                        placeholder="Input Question....."> {{$data[0]['question']}} </textarea>
                                </div>
                            </div>
                            <hr style="color: black; font-weight: bold">
                            <?php $no=1; ?>
                            <?php foreach($data_answer as $dataAnswer): ?>
                            <div class="row">
                                <input type="hidden" value="{{$dataAnswer['id']}}" name="answer_id[]">
                                <div class="mb-4 col-lg-9">
                                    <label for="paket" class="form-label">Answer {{$no++}} </label>
                                    <input type="text" class="form-control" id="answer[]" name="answer[]" aria-describedby="emailHelp" 
                                        placeholder="Input Answer 1....." value="{{$dataAnswer['answer']}}"/>
                                </div>
                                <div class="mb-4 col-lg-3">
                                    <label for="paket" class="form-label">Value</label>
                                    <div class="">
                                        <select id="defaultSelect" id="value[]" name="value[]" class="form-select">
                                            <option>Type Correct</option>
                                            <option value="true" {{ $dataAnswer['value'] === true ? "selected" : '' }}>TRUE</option>
                                            <option value="false" {{ $dataAnswer['value'] === false ? "selected" : '' }} >FALSE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <hr style="color: black; font-weight: bold">
                            <div class="row">
                                <div class="mb-4 col-lg-12">
                                    <label for="paket" class="form-label">Disscussion</label>
                                    <textarea type="text" class="form-control" id="pembahasan" name="pembahasan" aria-describedby="emailHelp" rows="8"
                                        placeholder="Input Disccussion....."> {{$data[0]['pembahasan']}} </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update Data</button>
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

