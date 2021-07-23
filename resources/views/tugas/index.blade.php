@extends('layouts/app')

@section('content')

<a class="btn btn-success" href="{{ route('tugasCreate', ['idMatapelajaran' => $idMatapelajaran]); }}"><i class="fas fa-book-medical"></i></a>

<select id="statusTugas" class="form-select mb-3" aria-label="Default select example">
    <option value="-" selected>Lihat Tugas Berdasarkan</option>
    @foreach ($data_status as $item)
        <option value="{{ $item->idStatustugas }}">{{ $item->deskripsiStatustugas }}</option>
    @endforeach
</select>

<div class="table-responsive">
    <div class="d-none d-lg-inline">
        <table class="table" id="tableTugas">
            <thead>
                <div class="row">
                    <tr>
                        <th class="col-md-2">Nama Tugas</th>
                        <th class="col-md-2">Tanggal Akhir Tugas</th>
                        <th class="col-md-2">Tempat Pengumpulan Tugas</th>
                        <th class="col-md-1">Waktu Tersisa</th>
                        <th class="col-md-2">Status</th>
                        <th class="col-md-3">Aksi</th>
                    </tr>
                </div>
            </thead>
            <tbody>
                @foreach ($data_tugas as $item)
                    <div class="row">
                        <tr>
                            <td class="col-md-2">{{ $item->namaTugas }}</td>
                            <td class="col-md-2">{{ $item->tanggaldeadlineTugas }}</td>
                            <td class="col-md-2">{{ $item->tempatpengumpulanTugas }}</td>
                            <td class="col-md-1">{{ date_create($item->tanggaldiberiTugas)->diff(date_create($item->tanggaldeadlineTugas))->format('%R%a') }} hari</td>
                            <td class="col-md-2">{{ $item->statustugas->deskripsiStatustugas }}</td>
                            <td class="col-md-3">
                                <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="#"><i class="fas fa-pen-square"></i></a></abbr>
                                <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                                <abbr title="Klik untuk menghapus data tugas ini"><a class="btn btn-danger w-10 h-10 rounded-circle" href="#"><i class="fas fa-trash-alt"></i></a></abbr>
                                
                                @if ($item->statustugas->aliasStatustugas != 'sudah_dikerjakan' && $item->statustugas->aliasStatustugas != 'sudah_batas_waktu_terlewat')
                                    <abbr title="Klik untuk melihat tugas pada tugas ini"><a class="btn btn-success w-10 h-10 rounded-circle" href="#"><i class="fas fa-check-circle"></i></a></abbr> 
                                @endif
                            </td>  
                        </tr>    
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Tampilan table untuk mobile --}}
    <div class="d-inline d-lg-none">
        <table class="table" id="tableTugasMobile">
            <thead>
                <tr>
                    <th>Nama Tugas</th>
                    <th>Tanggal Akhir Tugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_tugas as $item)
                    <tr>
                        <td>{{ $item->namaTugas }}</td>
                        <td>{{ $item->tanggaldeadlineTugas }}</td>
                        <td>
                            <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="#"><i class="fas fa-pen-square"></i></a></abbr>
                            <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                            <abbr title="Klik untuk menghapus data tugas ini"><a class="btn btn-danger w-10 h-10 rounded-circle" href="#"><i class="fas fa-trash-alt"></i></a></abbr>
                            <abbr title="Klik untuk melihat tugas pada tugas ini"><a class="btn btn-success w-10 h-10 rounded-circle" href="#"><i class="fas fa-check-circle"></i></a></abbr>    
                        </td>  
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')

    {{-- Simple Data Table --}}
    <script>
        const tableElement = document.querySelector("#tableTugas");
        const tableElementMobile = document.querySelector("#tableTugasMobile");

        const dataTable = new simpleDatatables.DataTable(tableElement);
        const dataTableMobile = new simpleDatatables.DataTable(tableElementMobile);
    </script>

@endsection