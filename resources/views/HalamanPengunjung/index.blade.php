<?php
@foreach ($pengunjungs as $pengunjung)
    <h2>{{ $pengunjung->id }}</h2>
    <p>{{ $pengunjung->nama }}</p>
    <p>{{ $pengunjung->tanggal_lahir }}</p>
    <p>{{ $pengunjung->jenis_kelamin }}</p>
    <p>{{ $pengunjung->alamat }}</p>
    <p>{{ $pengunjung->asal_kota }}</p>
    <hr>
@endforeach
?>
