@extends('layouts/app')

@section('content')

<a class="btn btn-success" href="{{ route('matapelajaranCreate'); }}"><i class="fas fa-book-medical"></i></a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama Mata Pelajaran</th>
            <th scope="col">Deskripsi Mata Pelajaran</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_mata_pelajaran as $mp)
            <tr>
                <td>{{ $mp->namaMatapelajaran }}</td>
                <td>{{ $mp->deskripsiMatapelajaran }}</td>
                <td>
                    <a class="btn btn-secondary w-10 h-10 rounded-circle" href="{{ route('matapelajaranEdit', ['idMatapelajaran' => $mp->idMatapelajaran]) }}"><i class="fas fa-pen-square"></i></a>
                    <a class="btn btn-info w-10 h-10 rounded-circle" href="{{ route('matapelajaranDetail', ['idMatapelajaran' => $mp->idMatapelajaran]) }}"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-danger w-10 h-10 rounded-circle" href="{{ route('matapelajaranDelete', ['idMatapelajaran' => $mp->idMatapelajaran]) }}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection