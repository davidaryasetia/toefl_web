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
                    <div>
                        <span class="card-title fw-semibold">Add Question</span>
                    </div>
                </div>

                <form action="{{ route('DataSoal.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-lg-12">
                            <label for="paket" class="form-label">Input Question</label>
                            <textarea type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp"
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
