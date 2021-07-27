@extends('layouts.main')
@section('content')

<div class="form-check">
    <input class="form-check-input tanggalTugas" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="tanggaldiberiTugas" checked>
    <label class="form-check-label" for="flexRadioDefault1">
        Lihat berdasarkan tanggal diberi tugas
    </label>
</div>
<div class="form-check">
    <input class="form-check-input tanggalTugas" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="tanggaldeadlineTugas">
    <label class="form-check-label" for="flexRadioDefault2">
        Lihat berdasarkan tanggal deadline tugas
    </label>
</div>

    <div id="calendarTugas"></div>

@endsection

@section('javascript')
    <script>
        var calendarElement = document.getElementById('calendarTugas');
        
        $(document).ready(function(){
            var calendarTugas = new FullCalendar.Calendar(calendarElement, {
                initialView: 'dayGridMonth',
                headerToolbar : {
                    start : 'prev',
                    center : 'title',
                    end : 'next'
                },
                titleFormat : { 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric' 
                },
                events : [
                    <?php foreach($data_tugas as $value) { ?>
                        {
                            id        : "<?= $value['id']?>",
                            title     : "<?= $value['namaTugas']?>",
                            deskripsi : "<?= $value['deskripsiTugas']?>",
                            start     : "<?= $value['tanggaldiberiTugas']?>",
                            end       : "",
                            backgroundColor : "green"
                        },
                    <?php } ?>
                ]
            });
            calendarTugas.render();


            $(".tanggalTugas").on('change', function(){
                var tanggalTugas = $(this).val();

                if (tanggalTugas == "tanggaldeadlineTugas"){
                    var calendarTugas = new FullCalendar.Calendar(calendarElement, {
                        initialView: 'dayGridMonth',
                        headerToolbar : {
                            start : 'prev',
                            center : 'title',
                            end : 'next'
                        },
                        titleFormat : { 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric' 
                        },
                        events : [
                            <?php foreach($data_tugas as $value) { ?>
                                {
                                    id        : "<?= $value['id']?>",
                                    title     : "<?= $value['namaTugas']?>",
                                    deskripsi : "<?= $value['deskripsiTugas']?>",
                                    start     : "<?= $value['tanggaldeadlineTugas']?>",
                                    end       : "",
                                    backgroundColor : "red"
                                },
                            <?php } ?>
                        ]
                    });
                    calendarTugas.render();
                } else {
                    var calendarTugas = new FullCalendar.Calendar(calendarElement, {
                        initialView: 'dayGridMonth',
                        headerToolbar : {
                            start : 'prev',
                            center : 'title',
                            end : 'next'
                        },
                        titleFormat : { 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric' 
                        },
                        events : [
                            <?php foreach($data_tugas as $value) { ?>
                                {
                                    id        : "<?= $value['id']?>",
                                    title     : "<?= $value['namaTugas']?>",
                                    deskripsi : "<?= $value['deskripsiTugas']?>",
                                    start     : "<?= $value['tanggaldiberiTugas']?>",
                                    end       : "",
                                    backgroundColor : "green"
                                },
                            <?php } ?>
                        ]
                    });
                    calendarTugas.render();
                }
            });
        });
        
    </script>
@endsection