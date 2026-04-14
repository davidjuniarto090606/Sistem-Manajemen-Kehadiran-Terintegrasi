@extends('layouts.app')

@section('content')

<div class="card">
    <h2>Form Absen</h2>

    <form method="POST" action="/attendance/masuk">
        @csrf
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <button type="submit">Absen Masuk</button>
    </form>
</div>

<div class="card">
    <h2>Data Absensi</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Masuk</th>
            <th>Pulang</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $d)
        <tr>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->tanggal }}</td>
            <td>{{ $d->jam_masuk }}</td>
            <td>{{ $d->jam_pulang ?? '-' }}</td>
            <td>
                @if(!$d->jam_pulang)
                    <a href="/attendance/pulang/{{ $d->id }}">
                        <button>Pulang</button>
                    </a>
                @else
                    Selesai
                @endif
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection