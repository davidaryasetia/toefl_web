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
    @if($data)
        <ul>
            @foreach($data as $item)
            <li style="font-size: 20px">{{ $item['name']}} - {{ $item['created_at']}}</li>
            @endforeach
        </ul>
    @else
        <p>No Data Available</p>
    @endif
</body>
</html>