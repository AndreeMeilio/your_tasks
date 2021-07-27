@extends('layouts.main')

@section('content')
<div class="table-responsive">
    <table class="table" id="tableMatapelajaran">
        <thead>
            <div class="row">
                <tr>
                    <th class="col-3 col-md-3">Nama Mata Pelajaran</th>
                    <th class="col-2 col-md-2">Nama Tugas</th>
                    <th class="col-3 col-md-3">Tanggal Akhir Tugas</th>
                    <th class="col-2 col-md-2">Status</th>
                    <th class="col-2 col-md-2">Aksi</th>
                </tr>
            </div>
        </thead>
        <tbody>
            @foreach ($data_tugas as $key => $item)
                @foreach ($item->tugas as $item_tugas)
                    <div class="row">
                        <tr style="font-weight: bold; color: black;" bgcolor="{{ $item_tugas->statustugas->colorStatustugas }}">
                            <td class="col-3 col-md-3">{{ $item->namaMatapelajaran }}</td>
                            <td class="col-2 col-md-2">{{ $item_tugas->namaTugas }}</td>
                            <td class="col-3 col-md-3">{{ $item_tugas->tanggaldeadlineTugas }}</td>
                            <td class="col-2 col-md-2">{{ $item_tugas->statustugas->deskripsiStatustugas }}</td>
                            <td class="col-3 col-md-3">
                                <abbr title="Klik untuk mencabut tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 ms-1 rounded-circle buttonTugasBerbintang" value="{{ $item_tugas->id }}"><i class="fas fa-star"></i></button></abbr>
                                <abbr title="Klik untuk melihat tugas pada mata pelajaran ini"><a class="btn btn-primary w-10 h-10 rounded-circle" href="{{ route('tugas', ['idMatapelajaran' => $item->id]) }}"><i class="fas fa-book-open"></i></a></abbr>

                            </td>
                        </tr>
                    </div>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection