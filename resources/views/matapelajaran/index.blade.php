@extends('layouts/main')

@section('content')

<a class="btn btn-success" href="{{ route('matapelajaranCreate'); }}"><i class="fas fa-book-medical"></i></a>

<div class="table-responsive">
    <table class="table" id="tableMatapelajaran">
        <thead>
            <div class="row">
                <tr>
                    <th class="col-9 col-md-9">Nama Mata Pelajaran</th>
                    <th class="col-3 col-md-3">Aksi</th>
                </tr>
            </div>
        </thead>
        <tbody>
            @foreach ($data_mata_pelajaran as $mp)
                <div class="row">
                    <tr>
                        <td class="col-9 col-md-9">{{ $mp->namaMatapelajaran }}</td>
                        <td class="col-3 col-md-3">
                            <abbr title="Klik untuk mengedit data mata pelajaran ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="{{ route('matapelajaranEdit', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-pen-square"></i></a></abbr>
                            <abbr title="Klik untuk melihat detail data mata pelajaran ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="{{ route('matapelajaranDetail', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-info-circle"></i></a></abbr>
                            <abbr title="Klik untuk menghapus data mata pelajaran ini"><button class="btn btn-danger w-10 h-10 rounded-circle buttonHapus" value="{{ $mp->id }}"><i class="fas fa-trash-alt"></i></button></abbr>
                            <abbr title="Klik untuk melihat tugas pada mata pelajaran ini"><a class="btn btn-primary w-10 h-10 rounded-circle" href="{{ route('tugas', ['idMatapelajaran' => $mp->id]) }}"><i class="fas fa-book-open"></i></a></abbr>

                        </td>
                    </tr>
                </div>
            @endforeach
        </tbody>
    </table>

    {{-- Form Untuk Menghapus Data --}}
    <div class="d-none d-lg-none">
        <form id="formHapus" method="POST">@csrf<input name="idMatapelajaran" id="idMatapelajarantext" type="text"><input type="submit" id="submitButton"></form>
    </div>
</div>
@endsection

@section('javascript')

    {{-- Simple Data Table --}}
    <script>
        const tableElement = document.querySelector("#tableMatapelajaran");
        const dataTable = new simpleDatatables.DataTable(tableElement);
    </script>

    <script>
        $(document).ready(function(){

            $(document).on('click', '.buttonHapus', function(){
                var idMatapelajaran = $(this).val();

                $.confirm({
                    title: 'Hapus Data Mata Pelajaran',
                    content: 'Seluruh Tugas Pada Mata Pelajaran Ini Akan Ikut Terhapus. Apa Anda Yakin Ingin Menghapus Data Ini',
                    type: 'red',
                    typeAnimated: true,
                    autoClose : 'cancelAction|10000',
                    buttons: {
                        tryAgain: {
                            text: 'Yakin',
                            btnClass: 'btn-red',
                            action: function(){
                                $("#formHapus").attr('action', '/matapelajaran/delete');
                                $('#idMatapelajarantext').val(idMatapelajaran);

                                $('#submitButton').click();
                            }
                        },
                        cancelAction: function () {
                        }
                    }
                });
            });
        });
    </script>

@endsection