@extends('layouts.main')

@section('row')
    @php
        $dataPaket = app('dataPaket');
        $dataTipe = app('dataTipe');
    @endphp
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span class="card-title fw-semibold me-3">Data User</span>
                        </div>
                        <div class="me-3">
                            <a href="DataUser/create" type="button" class="btn btn-primary"><i class="ti ti-plus"></i> Add
                                Admin</a>
                        </div>

                        <div class="d-flex justify-content-start">
                            <form action="" method="GET">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <div class="">
                                            <select id="" name="is_admin" class="form-select">
                                                <option value="">Role User</option>
                                                <option value="" <?php if (isset($_GET['is_admin']) && $_GET['is_admin'] === '') echo 'selected'; ?>>All Role</option>
                                                <option value="true" <?php if (isset($_GET['is_admin']) && $_GET['is_admin'] === 'true') echo 'selected'; ?>>Admin</option>
                                                <option value="false" <?php if (isset($_GET['is_admin']) && $_GET['is_admin'] === 'false') echo 'selected'; ?>>User</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-info">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-lg-4">
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


                <div class="table-responsive">
                    <table id="table_user" class="table table-hover table-bordered text-nowrap mb-0 align-middle">

                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0 text-center" style="width: 10px">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-left">Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Email</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 text-center">Admin</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Edit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Delete</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach($dataUser as $datauser): ?>
                            <tr>
                                <td class="border-bottom-0 text-center" style="width: 12px">
                                    <h6 class="fw-semibold mb-0">{{$no++}}</h6>
                                </td>
                                <td class="border-bottom-0"
                                    style="width: 100%; white-space: pre-line; word-wrap: break-word; text-align: justify; color: black">
                                    <span class="d-flex align-items-center" style="text-align: center;"> {{$datauser['name']}} </span>
                                </td>

                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center">{{$datauser['email']}}
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center">
                                        @if ($datauser['is_admin'])
                                        <span>Admin</span>
                                        @else
                                        <span>User</span>
                                        @endif
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal text-center"><a href="{{route('DataUser.edit', ['DataUser' => $datauser['id']])}}"><i class="ti ti-pencil"></i></a>
                                    </p>
                                </td>
                                <td class="border-bottom-0">
                                    <form action="{{ route('DataUser.destroy', ['DataUser' => $datauser['id']]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this data <?php echo $datauser['name']; ?> ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
