$(document).ready(function(){
            
            var idMatapelajaran = $("#idMatapelajaran").text();
        
            function getTugas(statusTugas = null){

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
                        var data_tugas_tabel = "";
                        var data_tugas_tabel_mobile = "";
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
                                                data_tugas_tabel += `<abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><a class="btn btn-success w-10 h-10 ms-1 rounded-circle" href="/matapelajaran/`+ element.matapelajaran_id +`/tugas/`+ element.id +`/check"><i class="fas fa-check-circle"></i></a></abbr>`;
                                            }

                                            data_tugas_tabel += `
                                        </td>  
                                    </tr>    
                                </div>
                            `;

                            data_tugas_tabel_mobile += `
                                <div class="row">
                                    <tr style="font-weight: bold; color: black;" bgcolor="`+ element.statustugas.colorStatustugas +`">
                                        <td class="col-md-2">`+ element.namaTugas +`</td>
                                        <td class="col-md-2">`+ element.tanggaldeadlineTugas +`</td>
                                        <td class="col-md-3">
                                            <abbr title="Klik untuk mengedit data tugas ini"><a class="btn btn-secondary w-10 h-10 rounded-circle" href="/matapelajaran/`+ element.matapelajaran_id +`/tugas/`+ element.id +`/edit"><i class="fas fa-pen-square"></i></a></abbr>
                                            <abbr title="Klik untuk melihat detail data tugas ini"><a class="btn btn-info w-10 h-10 rounded-circle" href="#"><i class="fas fa-info-circle"></i></a></abbr>
                                            <abbr title="Klik untuk menghapus data tugas ini"><button class="btn btn-danger w-10 h-10 rounded-circle buttonHapus" value="`+ element.id +`"><i class="fas fa-trash-alt"></i></button></abbr>`;

                                            if (element.tugas_berbintang == 1){
                                                data_tugas_tabel_mobile += `<abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 rounded-circle buttonTugasBerbintang" value="`+ element.id +`"><i class="far fa-star"></i></button></abbr>`;   
                                            } else {
                                                data_tugas_tabel_mobile += `<abbr title="Klik untuk menandai tugas sebagai tugas berbintang"><button class="btn btn-warning w-10 h-10 rounded-circle buttonTugasBerbintang" value="`+ element.id +`"><i class="fas fa-star"></i></button></abbr>`;
                                            }

                                            if (element.statustugas.aliasStatustugas != 'sudah_dikerjakan' && element.statustugas.aliasStatustugas != 'sudah_batas_waktu_terlewat'){
                                                data_tugas_tabel_mobile += `<abbr title="Klik untuk mengubah status tugas menjadi sudah dikerjakan"><a class="btn btn-success w-10 h-10 rounded-circle" href="/matapelajaran/`+ element.matapelajaran_id +`/tugas/`+ element.id +`/check"><i class="fas fa-check-circle"></i></a></abbr>`;
                                            }

                                            data_tugas_tabel_mobile += `
                                        </td>  
                                    </tr>    
                                </div>
                            `;
                        }

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


            $("#statusTugas").on('change', function(){
                var idStatustugas = $("#statusTugas option:selected").val();
                getTugas(idStatustugas);
            });

            getTugas();
            
            //Request Ajax Untuk Menandai Tugas Sebagai Tugas Berbintang
            $(document).on('click', '.buttonTugasBerbintang', function(){
                var idTugas = $(this).val();
                var urlTugasBerbintang = '/matapelajaran/' + idMatapelajaran + '/tugas/' + idTugas + '/tugasBerbintang';

                $.ajax({
                    type : "GET",
                    url : urlTugasBerbintang,
                    cache : false,
                    success : function(msg){
                        getTugas();

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
                                        getTugas();

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
                                    }
                                });
                            }
                        },
                        cancelAction: function () {
                        }
                    }
                });
            });
        });