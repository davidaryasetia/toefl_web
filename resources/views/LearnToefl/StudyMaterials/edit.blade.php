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
                        <a href="{{ url()->previous() }}" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                style="font-size: 20px; color: black"></i>
                        </a>
                    </div>
                    <div class="me-2">
                        <span class="card-title fw-semibold">Update Topic Materials</span>
                    </div>
                    {{-- <button type="button" class="btn rounded-pill btn-outline-primary" id="addQuestion">Add Row</button> --}}
                </div>

                <form action="{{ route('StudyMaterials.update', ['StudyMaterial' => $material['id']]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="question-fields">
                        <div class="question-template">

                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label for="Modul" class="form-label">Modul Matery</label>
                                    <div class="">
                                        <select id="defaultSelect" id="modul_id" name="modul_id" class="form-select">
                                            <option>Choice Type Modul</option>
                                            @foreach ($dataTipe['dataTipe'] as $type)
                                            <option value="{{ $type['id'] }}"
                                                {{ $type['id'] == $material['modul_id'] ? 'selected' : '' }}>
                                                {{ $type['name'] }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label for="paket" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        aria-describedby="emailHelp" placeholder="Input Title....." value="{{$material['title']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-lg-12">
                                    <label for="paket" class="form-label">Content</label>
                                    <textarea type="text" class="form-control" id="content" name="content" aria-describedby="emailHelp" rows="20"
                                        placeholder="Input Content......."> {{$material['content']}} </textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
