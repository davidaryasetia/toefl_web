@extends('layouts.main');

@section('row')
<h1>Test Fetch Data</h1>

<table style="border-collapse: collapse; width: 100%">
    <thead>
        <tr>ID</tr>
        <tr>Nama</tr>
    </thead>
    <tbody>
        <?php foreach($data as $paket): ?>
        <td><?php echo $paket['id']; ?></td>
        <td><?php echo $paket['name']; ?></td>
        <?php endforeach; ?>
    </tbody>
</table>
@endsection