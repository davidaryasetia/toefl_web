@extends('layouts.main')



@section('row')
    <div>
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Leaderboard Test Toefl</h5>
                        <div class="table-responsive">
                            <table id="table_dashboard" class="table table-hover table-bordered text-nowrap mb-0 align-middle ">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Listening Score</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Structure Score</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Reading Score</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Total Score</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach($data as $dataLeader): ?>
                                    <tr>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"> {{$no++}} </h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"> {{$dataLeader['users']['name']}} </h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"> {{$dataLeader['listening_score']}} </h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"> {{$dataLeader['structure_score']}} </h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"> {{$dataLeader['reading_score']}} </h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0"> {{$dataLeader['total_score']}} </h6>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
