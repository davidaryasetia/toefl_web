@extends('layouts.main')

@section('row')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <span class="card-title fw-semibold me-3">Topic Study Matery</span>
                        </div>
                        <div>
                            <a href="StudyMaterials/create" type="button" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Add
                                Matery</a>
                        </div>
                    </div>

                    <div>
                        @if (session('success'))
                            <div class="alert alert-primary" style role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" style role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <script>
                        setTimeout(function() {
                            document.querySelectorAll('.alert').forEach(function(alert) {
                                alert.style.display = "none";
                            });
                        }, 5000);
                    </script>
                </div>

                <div class="table-material">
                    <table id="table_material" class="table table-hover table-bordered text-nowrap mb-0 align-middle">

                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0 text-center" style="width: 10px">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Modul</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Matery</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Add Question</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Show Matery</h6>
                                </th>
                                
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Edit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Delete</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($data as $DataMaterial): ?>
                            <tr>
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-0"><?php echo $no++; ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="p-1">
                                        <h6 class="fw-semibold mb-1 text-center"> {{$DataMaterial['type']['name']}} </h6>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="p-1">
                                        <h6 class="fw-semibold mb-1 text-center"> {{$DataMaterial['title']}} </h6>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a
                                            href="{{ route('StudyMaterials.show', ['StudyMaterial' => $DataMaterial['id']]) }}"><i
                                                class="ti ti-plus me-2"></i> Question</a></p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a
                                            href="{{ route('StudyMaterials.show', ['StudyMaterial' => $DataMaterial['id']]) }}"><i
                                                class="ti ti-eye"></i></a></p>
                                </td>
                                
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a
                                            href="{{ route('StudyMaterials.edit', ['StudyMaterial' => $DataMaterial['id']]) }}"><i
                                                class="ti ti-pencil"></i></a></p>
                                </td>
                                <td class="border-bottom-0">
                                    <form action="{{ route('StudyMaterials.destroy', ['StudyMaterial' => $DataMaterial['id']]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this Topic Matery <?php echo $DataMaterial['title']; ?> ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
