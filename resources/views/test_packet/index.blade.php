<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Fetch Data</title>
</head>
<body>

    <h1>Test Fetch Data</h1>
    <a href="{{ route('test_packet.create') }}" class="btn btn-primary">Tambah Data</a>
    @forelse($packet as $data)
    <tr>
        <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td></td>
      <td></td>
     
    </tr>
    @empty
    <tr>
        <td colspan="6">Data</td>
    </tr>
    @endforelse
</body>
<dd/html>