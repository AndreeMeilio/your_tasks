@extends('layouts/main')

@section('content')
<div class="d-none d-lg-none" id="idMatapelajaran">{{ $idMatapelajaran }}</div>

<a class="btn btn-success" href="{{ route('tugasCreate', ['idMatapelajaran' => $idMatapelajaran]); }}"><i class="fas fa-book-medical"></i></a>

<div class="row">
    <div class="col-12 col-lg-6">
        <label for="statusTugas">Lihat Tugas Berdasarkan Status</label>
    </div>
    <div class="col-12 col-lg-6">
        <label for="deleteTugasStatus">Hapus Tugas Berdasarkan Status</label>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="row">
            <div class="col-8 col-lg-8">
                <select id="statusTugas" class="form-select mb-3" aria-label="Default select example">
                    <option value="" selected>Pilih Status Tugas</option>
                    @foreach ($data_status as $item)
                    <option value="{{ $item->id }}">{{ $item->deskripsiStatustugas }}</option>
                    @endforeach
                </select>

                {{-- Form For Submiting See Data Per Status --}}
                <div class="d-none d-lg-none">
                    <form method="POST" action="{{ route('getTugasPerStatus', ['idMatapelajaran' => $idMatapelajaran]) }}">
                        @csrf

                        <input type="text" name="idStatustugas" id="value_id_status">
                        <input type="submit" id="submitTugasPerstatus">
                    </form>
                </div>

            </div>
            <div class="col-4 col-lg-4">
                <button type="button" class="btn btn-secondary" id="tugasPerStatus">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>Lihat</span>
                </button>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="row">
            <div class="col-8 col-lg-8">
                <select id="deleteTugasStatus" class="form-select mb-3" aria-label="Default select example">
                    <option value="" selected>Pilih Status Tugas</option>
                    @foreach ($data_status as $item)
                    <option value="{{ $item->id }}">{{ $item->deskripsiStatustugas }}</option>
                    @endforeach
                </select>

                {{-- Form For Submiting Delete Data Per Status --}}
                <div class="d-none d-lg-none">
                    <form method="POST" action="{{ route('hapus_tugas_berdasarkan_status', ['idMatapelajaran' => $idMatapelajaran]) }}">
                        @csrf

                        <input type="text" name="deleteIdStatustugas" id="value_delete_id_status">
                        <input type="submit" id="submitDeleteTugasPerStatus">
                    </form>
                </div>
            </div>
            <div class="col-4 col-lg-4">
                <button type="button" class="btn btn-danger" id="btnDeleteTugasStatus">
                    <i class="fas fa-fw fa-trash-alt"></i>
                    <span>Hapus</span>
                </button>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-6 col-lg-6">
        Jumlah Tugas : <span id="jumlahTugas"></span>
    </div>
    <div class="col-6 col-lg-6">
        <a class="btn btn-secondary float-end" href="{{ route('tugasKalendarMode', ['idMatapelajaran' => $idMatapelajaran]) }}"><i class="fas fa-fw fa-calendar-alt"></i><span>Kalendar Mode</span></a>
    </div>
</div>

<div class="table-responsive">
    <div class="d-none d-lg-inline">
        <table class="table" id="tableTugas">
            <thead>
                <div class="row">
                    <tr style="font-weight: bold; color: black">
                        <th class="col-md-2">Nama Tugas</th>
                        <th class="col-md-2">Tanggal Akhir Tugas</th>
                        <th class="col-md-2">Tempat Pengumpulan Tugas</th>
                        <th class="col-md-1">Waktu Tersisa</th>
                        <th class="col-md-2">Status</th>
                        <th class="col-md-3">Aksi</th>
                    </tr>
                </div>
            </thead>
            <tbody id="data_tugas_tabel">
                @foreach ($data_tugas as $item)
                    <div class="row">
                        <tr style="font-weight: bold; color: black;" bgcolor="{{ $item->statustugas->colorStatustugas }}">
                            <td class="col-md-2">{{ $item->namaTugas }}</td>
                            <td class="col-md-2">{{ $item->tanggaldeadlineTugas }}</td>
                            <td class="col-md-2">{{ $item->tempatpengumpulanTugas }}</td>
                            <td class="col-md-1">{{ date_create(date('Y-m-d'))->diff(date_create($item->tanggaldeadlineTugas))->format('%R%a') }} hari</td>
                            <td class="col-md-2">{{ $item->statustugas->deskripsiStatustugas }}</td>
                            <td class="col-md-3">
                                <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="{{ route('tugasEdit', ['idMatapelajaran' => $item->matapelajaran_id, 'idTugas' => $item->id]) }}"><i class="fas fa-pen-square"></i></a></abbr>
                                <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                                <abbr title="Klik untuk menghapus data tugas ini"><button class="btn btn-danger w-10 h-10 rounded-circle buttonHapus" value="{{ $item->id }}"><i class="fas fa-trash-alt"></i></button></abbr>
                                
                                @if ($item->tugas_berbintang == 1)
                                    <abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><a class="btn btn-warning w-10 h-10 ms-1 rounded-circle" href="{{ route('tugasTandaiBerbintang', ['idMatapelajaran' => $item->matapelajaran_id, 'idTugas' => $item->id]) }}"><i class="far fa-star"></i></a></abbr>
                                @else
                                    <abbr title="Klik untuk mencabut tugas sebagai tugas berbintang"><a class="btn btn-warning w-10 h-10 ms-1 rounded-circle" href="{{ route('tugasTandaiBerbintangCancel', ['idMatapelajaran' => $item->matapelajaran_id, 'idTugas' => $item->id]) }}"><i class="fas fa-star"></i></a></abbr>
                                @endif

                                @if ($item->statustugas->aliasStatustugas != 'sudah_dikerjakan' && $item->statustugas->aliasStatustugas != 'sudah_batas_waktu_terlewat')
                                    <abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><a class="btn btn-success w-10 h-10 rounded-circle" href="{{ route('tugasTerselesaikan', ['idMatapelajaran' => $idMatapelajaran, 'idTugas' => $item->id]) }}"><i class="fas fa-check-circle"></i></a></abbr> 
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
                <div class="row">
                    <tr>
                        <th class="col-4">Nama Tugas</th>
                        <th class="col-4">Tanggal Akhir Tugas</th>
                        <th class="col-4">Aksi</th>
                    </tr>
                </div>
            </thead>
            <tbody id="data_tugas_tabel_mobile">
                @foreach ($data_tugas as $item)
                    <tr>
                        <td>{{ $item->namaTugas }}</td>
                        <td>{{ $item->tanggaldeadlineTugas }}</td>
                        <td>
                            <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="#"><i class="fas fa-pen-square"></i></a></abbr>
                            <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                            <abbr title="Klik untuk menghapus data tugas ini"><a class="btn btn-danger w-10 h-10 rounded-circle" href="#"><i class="fas fa-trash-alt"></i></a></abbr>
                            <abbr title="Klik untuk melihat tugas pada tugas ini"><a class="btn btn-success w-10 h-10 rounded-circle" href="#"><i class="fas fa-check-circle"></i></a></abbr>
                            
                            @if ($item->tugas_berbintang == 1)
                                <abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><a class="btn btn-warning w-10 h-10 ms-1 rounded-circle" href="{{ route('tugasTandaiBerbintang', ['idMatapelajaran' => $item->matapelajaran_id, 'idTugas' => $item->id]) }}"><i class="far fa-star"></i></a></abbr>
                            @else
                                <abbr title="Klik untuk mencabut tugas sebagai tugas berbintang"><a class="btn btn-warning w-10 h-10 ms-1 rounded-circle" href="{{ route('tugasTandaiBerbintangCancel', ['idMatapelajaran' => $item->matapelajaran_id, 'idTugas' => $item->id]) }}"><i class="fas fa-star"></i></a></abbr>
                            @endif

                            @if ($item->statustugas->aliasStatustugas != 'sudah_dikerjakan' && $item->statustugas->aliasStatustugas != 'sudah_batas_waktu_terlewat')
                                <abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><a class="btn btn-success w-10 h-10 rounded-circle" href="{{ route('tugasTerselesaikan', ['idMatapelajaran' => $idMatapelajaran, 'idTugas' => $item->id]) }}"><i class="fas fa-check-circle"></i></a></abbr> 
                            @endif
                        </td>  
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        var tableElement = document.getElementById('tableTugas');
        var tableElementMobile = document.getElementById('tableTugasMobile');
        var data_table = new simpleDatatables.DataTable(tableElement);
        var data_tableMobile = new simpleDatatables.DataTable(tableElementMobile);

        
        $(document).ready(function(){
            var idMatapelajaran = $("#idMatapelajaran").text();

            $("#tugasPerStatus").on('click', function(){
                var idStatustugas = $("#statusTugas").children('option:selected').val();

                $("#value_id_status").val(idStatustugas);
                $("#submitTugasPerstatus").click();
            });

            //Request Ajax Untuk Menghapus Data
            $(document).on('click', '.buttonHapus', function(){
                var idTugas = $(this).val();
                var urlHapus = '/matapelajaran/' + idMatapelajaran + '/tugas/'+ idTugas +'/delete';

                $.confirm({
                    title: 'Hapus Data Tugas',
                    content: 'Apakah anda yakin ingin menghapus data tugas ini?',
                    type: 'red',
                    typeAnimated: true,
                    autoClose : 'cancelAction|10000',
                    buttons: {
                        tryAgain: {
                            text: 'Yakin',
                            btnClass: 'btn-red',
                            action: function(){
                                window.location = urlHapus;
                            }
                        },
                        cancelAction: function () {
                        }
                    }
                });
            });

            //Request Ajax Untuk Delete Berdasarkan Status
            $(document).on('click', '#btnDeleteTugasStatus', function(){
                var idStatustugasDelete = $("#deleteTugasStatus").val();
                var textStatustugas = $("#deleteTugasStatus").children('option:selected').text();

                var titleHapus = "Hapus Semua Tugas Dengan Status " + textStatustugas;

                if (idStatustugasDelete == "" || idStatustugasDelete == null){
                    $.confirm({
                        title : "Status Tidak Dipilih",
                        content : "Tolong pilih terlebih dahulu status tugas mana yang akan dihapus!",
                        type : 'orange',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text : "OK",
                                btnClass: 'btn-yellow',
                                action : function(){}
                            }
                        }
                    });
                } else {
                    $.confirm({
                        title : titleHapus,
                        content : "Apa anda yakin ingin menghapus semua tugas yang berstatus " + textStatustugas + "?",
                        type: 'red',
                        typeAnimated: true,
                        autoClose : 'cancelAction|10000',
                        buttons: {
                            tryAgain: {
                                text: 'Yakin',
                                btnClass: 'btn-red',
                                action: function(){
                                    $("#value_delete_id_status").val(idStatustugasDelete)
                                    $("#submitDeleteTugasPerStatus").click();
                                }
                            },
                            cancelAction: function () {
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection