@extends('layouts/app')

@section('content')

<a class="btn btn-success" href="{{ route('matapelajaranCreate'); }}"><i class="fas fa-book-medical"></i></a>

<div class="table-responsive">
    <table class="table">
        <thead>
            <div class="row">
                <tr>
                    <th class="col-2 col-md-2">Nama Mata Pelajaran</th>
                    <th class="col-7 col-md-7">Deskripsi Mata Pelajaran
                    <th class="col-3 col-md-3">Aksi</th>
                </tr>
            </div>
        </thead>
        <tbody>
            @foreach ($data_mata_pelajaran as $mp)
                <div class="row">
                    <tr>
                        <td class="col-2 col-md-2">{{ $mp->namaMatapelajaran }}</td>
                        <td class="col-7 col-md-7">{{ $mp->deskripsiMatapelajaran }}</td>
                        <td class="col-3 col-md-3">
                            <abbr title="Klik untuk mengedit data mata pelajaran ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="{{ route('matapelajaranEdit', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-pen-square"></i></a></abbr>
                            <abbr title="Klik untuk melihat detail data mata pelajaran ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="{{ route('matapelajaranDetail', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-info-circle"></i></a></abbr>
                            <abbr title="Klik untuk menghapus data mata pelajaran ini"><a class="btn btn-danger w-10 h-10 rounded-circle" href="{{ route('matapelajaranDelete', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-trash-alt"></i></a></abbr>
                            <abbr title="Klik untuk melihat tugas pada mata pelajaran ini"><a class="btn btn-primary w-10 h-10 rounded-circle" href="{{ route('tugas', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-book-open"></i></a></abbr>
                        </td>
                    </tr>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection