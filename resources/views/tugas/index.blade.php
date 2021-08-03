@extends('layouts/main')

@section('content')
<div class="d-none d-lg-none" id="idMatapelajaran">{{ $idMatapelajaran }}</div>

<div id="notifikasi"></div>

<a class="btn btn-success" href="{{ route('tugasCreate', ['idMatapelajaran' => $idMatapelajaran]); }}"><i class="fas fa-book-medical"></i></a>

<div class="row">
    <div class="col-12 col-lg-6">
        <label for="statusTugas">Lihat Tugas Berdasarkan Status</label>
        <select id="statusTugas" class="form-select mb-3" aria-label="Default select example">
            <option value="" selected>Pilih Status Tugas</option>
            @foreach ($data_status as $item)
            <option value="{{ $item->id }}">{{ $item->deskripsiStatustugas }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-lg-6">
        <div class="row">
            <div class="col-10 col-lg-10">
                <label for="deleteTugasStatus">Hapus Tugas Berdasarkan Status</label>
                <select id="deleteTugasStatus" class="form-select mb-3" aria-label="Default select example">
                    <option value="" selected>Pilih Status Tugas</option>
                    @foreach ($data_status as $item)
                    <option value="{{ $item->id }}">{{ $item->deskripsiStatustugas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2 col-lg-2">
                <button type="button" class="btn btn-danger" id="btnDeleteTugasStatus">Hapus</button>
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
                {{-- @foreach ($data_tugas as $item)
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
                                
                                @if ($item->statustugas->aliasStatustugas != 'sudah_dikerjakan' && $item->statustugas->aliasStatustugas != 'sudah_batas_waktu_terlewat')
                                    <abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><a class="btn btn-success w-10 h-10 rounded-circle" href="{{ route('tugasTerselesaikan', ['idMatapelajaran' => $idMatapelajaran, 'idTugas' => $item->id]) }}"><i class="fas fa-check-circle"></i></a></abbr> 
                                @endif
                            </td>  
                        </tr>    
                    </div>
                @endforeach --}}
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
                {{-- @foreach ($data_tugas as $item)
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
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            var idMatapelajaran = $("#idMatapelajaran").text();
            

            function getTugas(statusTugas = null){
                
                var data_tugas_tabel = "";
                var data_tugas_tabel_mobile = "";
                var urlGetTugas = "";

                if (statusTugas != null){
                    urlGetTugas += "/matapelajaran/" + idMatapelajaran + "/tugas/get/" + statusTugas;
                } else {
                    urlGetTugas += "/matapelajaran/" + idMatapelajaran + "/tugas/get/";
                }

                $.ajax({
                    type : "GET",
                    url : urlGetTugas,
                    cache : false,
                    success : function(data_tugas){
                        
                        var jumlahTugas = data_tugas.length;

                        for(let i = 0; i < data_tugas.length; i++){
                            const element = data_tugas[i];

                            var tanggalsekarang = new Date();
                            var tanggaldeadlineTugas = new Date(element.tanggaldeadlineTugas);

                            var diffTime = tanggaldeadlineTugas - tanggalsekarang;
                            var sisa_waktu = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

                            data_tugas_tabel += `
                                <div class="row">
                                    <tr style="font-weight: bold; color: black;" bgcolor="`+ element.statustugas.colorStatustugas +`">
                                        <td class="col-md-2">`+ element.namaTugas +`</td>
                                        <td class="col-md-2">`+ element.tanggaldeadlineTugas +`</td>
                                        <td class="col-md-2">`+ element.tempatpengumpulanTugas +`</td>
                                        <td class="col-md-1">`+ sisa_waktu +` hari</td>
                                        <td class="col-md-2">`+ element.statustugas.deskripsiStatustugas +`</td>
                                        <td class="col-md-3">
                                            <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="/matapelajaran/`+ element.matapelajaran_id +`/tugas/`+ element.id +`/edit"><i class="fas fa-pen-square"></i></a></abbr>
                                            <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                                            <abbr title="Klik untuk menghapus data tugas ini"><button class="btn btn-danger w-10 h-10 rounded-circle buttonHapus" value="`+ element.id +`"><i class="fas fa-trash-alt"></i></button></abbr>`;

                                            if (element.tugas_berbintang == 1){
                                                data_tugas_tabel += `<abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 ms-1 rounded-circle buttonTugasBerbintang" value="`+ element.id +`"><i class="far fa-star"></i></button></abbr>`;   
                                            } else {
                                                data_tugas_tabel += `<abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 ms-1 rounded-circle buttonTugasBerbintang" value="`+ element.id +`"><i class="fas fa-star"></i></button></abbr>`;
                                            }

                                            if (element.statustugas.aliasStatustugas != 'sudah_dikerjakan' && element.statustugas.aliasStatustugas != 'sudah_batas_waktu_terlewat'){
                                                data_tugas_tabel += `<abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><button class="btn btn-success w-10 h-10 ms-1 rounded-circle buttonSelesai" value="`+ element.id +`"><i class="fas fa-check-circle"></i></button></abbr>`;
                                            }

                                            data_tugas_tabel += `
                                        </td>  
                                    </tr>    
                                </div>
                            `;

                            data_tugas_tabel_mobile += `
                                <div class="row">
                                    <tr style="font-weight: bold; color: black;" bgcolor="`+ element.statustugas.colorStatustugas +`">
                                        <td class="col-4">`+ element.namaTugas +`</td>
                                        <td class="col-4">`+ element.tanggaldeadlineTugas +`</td>
                                        <td class="col-4">
                                            <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="/matapelajaran/`+ element.matapelajaran_id +`/tugas/`+ element.id +`/edit"><i class="fas fa-pen-square"></i></a></abbr>
                                            <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                                            <abbr title="Klik untuk menghapus data tugas ini"><button class="btn btn-danger w-10 h-10 rounded-circle buttonHapus" value="`+ element.id +`"><i class="fas fa-trash-alt"></i></button></abbr>`;

                                            if (element.tugas_berbintang == 1){
                                                data_tugas_tabel_mobile += `<abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 rounded-circle buttonTugasBerbintang" value="`+ element.id +`"><i class="far fa-star"></i></button></abbr>`;   
                                            } else {
                                                data_tugas_tabel_mobile += `<abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 rounded-circle buttonTugasBerbintang" value="`+ element.id +`"><i class="fas fa-star"></i></button></abbr>`;
                                            }

                                            if (element.statustugas.aliasStatustugas != 'sudah_dikerjakan' && element.statustugas.aliasStatustugas != 'sudah_batas_waktu_terlewat'){
                                                data_tugas_tabel_mobile += `<abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><button class="btn btn-success w-10 h-10 ms-1 rounded-circle buttonSelesai" value="`+ element.id +`"><i class="fas fa-check-circle"></i></button></abbr>`;
                                            }

                                            data_tugas_tabel_mobile += `
                                        </td>  
                                    </tr>    
                                </div>
                            `;
                        }

                    },
                    complete: function(){
                        $("#jumlahTugas").html(jumlahTugas);
                        $("#data_tugas_tabel").html(data_tugas_tabel);
                        $("#data_tugas_tabel_mobile").html(data_tugas_tabel_mobile);


                        var tableElement = document.getElementById('tableTugas');
                        var tableElementMobile = document.getElementById('tableTugasMobile');
                        var data_table = new simpleDatatables.DataTable(tableElement);
                        var data_tableMobile = new simpleDatatables.DataTable(tableElementMobile);
                        
                        
                    }
                });
            }

            getTugas();


            $("#statusTugas").on('change', function(){
                var idStatustugas = $("#statusTugas option:selected").val();
                getTugas(idStatustugas);
            });

            
            //Request Ajax Untuk Menandai Tugas Sudah Diselesaikan
            $(document).on('click', '.buttonSelesai', function(){
                var idTugas = $(this).val();
                var urlTugasSelesai = '/matapelajaran/' + idMatapelajaran + '/tugas/' + idTugas + '/check';

                $.ajax({
                    type : "GET",
                    url : urlTugasSelesai,
                    cache : false,
                    success : function(msg){
                        if (msg != "data tidak bisa ditandai sebagai selesai"){
                            $("#notifikasi").html(
                                `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>`+ msg +`</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                            );
                        } else {
                            $("#notifikasi").html(
                                `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>`+ msg +`</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                            );
                        }
                    },
                    complete : function(){
                        getTugas();
                    }
                });
            });
            
            //Request Ajax Untuk Menandai Tugas Sebagai Tugas Berbintang
            $(document).on('click', '.buttonTugasBerbintang', function(){
                var idTugas = $(this).val();
                var urlTugasBerbintang = '/matapelajaran/' + idMatapelajaran + '/tugas/' + idTugas + '/tugasBerbintang';

                $.ajax({
                    type : "GET",
                    url : urlTugasBerbintang,
                    cache : false,
                    success : function(msg){

                        if (msg != "data tidak bisa ditandai sebagai tugas berbintang"){
                            $("#notifikasi").html(
                                `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>`+ msg +`</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                            );
                        } else {
                            $("#notifikasi").html(
                                `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>`+ msg +`</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`
                            );
                        }
                    },
                    complete : function(){
                        getTugas();
                    }
                });
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
                                $.ajax({
                                    type : "GET",
                                    url : urlHapus,
                                    cache : false,
                                    success : function(msg){
                                    

                                        if (msg == "Data Tugas Berhasil Dihapus"){
                                            $("#notifikasi").html(
                                                `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>`+ msg +`</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`
                                            );
                                        } else {
                                            $("#notifikasi").html(
                                                `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>`+ msg +`</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`
                                            );
                                        } 
                                    },
                                    complete : function(){
                                        getTugas();
                                    }
                                });
                            }
                        },
                        cancelAction: function () {
                        }
                    }
                });
            });

            //Request Ajax Untuk Delete Berdasarkan Status
            $(document).on('click', '#btnDeleteTugasStatus', function(){
                var idStatustugas = $("#deleteTugasStatus").val();
                var textStatustugas = $("#deleteTugasStatus").children('option:selected').text();

                var titleHapus = "Hapus Semua Tugas Dengan Status " + textStatustugas;

                if (idStatustugas == "" || idStatustugas == null){
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

                                    $.ajax({
                                        type : "POST",
                                        url : '/matapelajaran/tugas/hapus_berdasarkan_status',
                                        data : {
                                            _token : '<?php echo csrf_token() ?>',
                                            idStatustugas : idStatustugas
                                        },
                                        success : function(msg){

                                            if (msg == "Data Tugas Berhasil Dihapus"){
                                                $("#notifikasi").html(
                                                    `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>`+ msg +`</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`
                                                );
                                            } else {
                                                $("#notifikasi").html(
                                                    `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>`+ msg +`</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>`
                                                );
                                            } 
                                        },
                                        complete : function(){
                                            getTugas();
                                        }
                                    });
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