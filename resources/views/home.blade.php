@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-success text-uppercase mb-1">Jumlah Tugas Selesai</div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">{{ count($tugas_sudah_dikerjakan) + count($tugas_sudah_batas_terlewat) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-secondary text-uppercase mb-1">Jumlah Tugas Belum
                            Dikerjakan</div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">{{ count($tugas_belum_dikerjakan) + count($tugas_batas_waktu_terlewat) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Tugas Dengan
                            Status Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 jumlah_tugas_selesai">{{ count($tugas_sudah_dikerjakan) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Tugas Dengan
                            Status Selesai Terlambat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 jumlah_tugas_selesai_terlambat">{{ count($tugas_sudah_batas_terlewat) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Jumlah Tugas Dengan
                            Status Belum Dikerjakan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 jumlah_tugas_belum">{{ count($tugas_belum_dikerjakan) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Tugas Dengan Status
                            Terlambat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 jumlah_tugas_terlambat">{{ count($tugas_batas_waktu_terlewat) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-xl-7 col-md-7">
        <div style="height: 300px" class="card shadow">
            <div class="card-body">
                <div id="graphLineJumlahTugas"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-md-5">
        <div style="height: 300px" class="card shadow">
            <div class="card-body">
                <div class="pt-4" id="graphPieJumlahTugas"></div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Mata Pelajaran</th>
                    <th scope="col">Jumlah Tugas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_mata_pelajaran as $item)
                    <tr>
                        <td>{{ $item->namaMatapelajaran }}</td>
                        <td>{{ count($item->tugas) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">
        <div id="graphBarMatapelajaran"></div>
    </div>
</div>

<div class="d-none d-lg-none">
    <input type="number" id="val_sudah_dikerjakan" value="{{ count($tugas_sudah_dikerjakan) }}">
    <input type="number" id="val_sudah_dikerjakan_terlambat" value="{{ count($tugas_sudah_batas_terlewat) }}">
    <input type="number" id="val_belum_dikerjakan" value="{{ count($tugas_belum_dikerjakan) }}">
    <input type="number" id="val_batas_waktu_terlewat" value="{{ count($tugas_batas_waktu_terlewat) }}">
</div>

@endsection

@section('javascript')
<script>
    var jumlah_tugas_selesai = document.getElementById('val_sudah_dikerjakan').value;
    var jumlah_tugas_belum = document.getElementById('val_belum_dikerjakan').value;
    var jumlah_tugas_terlambat = document.getElementById('val_batas_waktu_terlewat').value;
    var jumlah_tugas_selesai_terlambat = document.getElementById('val_sudah_dikerjakan_terlambat').value;

    var optionsLine = {
        chart: {
            height: 250,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        series: [{
                name: 'Selesai',
                data: [23, 29, 11, 12, 31, 9],

            },
            {
                name: 'Belum Dikerjakan',
                data: [3, 1, 0, 6, 9, 1],

            },
            {
                name: 'Terlambat',
                data: [0, 0, 1, 2, 2, 1],
            },
            {
                name: 'Selesai Terlambat',
                data: [5, 2, 1, 1, 6, 4],

            }
        ],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Juni"]
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        legend: {
            position: 'top'
        },

    };

    var optionsPie = {
        chart: {
            type: 'pie'
        },
        series: [
            parseInt(jumlah_tugas_selesai),
            parseInt(jumlah_tugas_belum),
            parseInt(jumlah_tugas_terlambat),
            parseInt(jumlah_tugas_selesai_terlambat),
        ],
        labels: ['Selesai', 'Belum Dikerjakan', 'Terlambat', 'Selesai Terlambat'],
        stroke: {
            colors: ['#fff']
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: 'right'
                }
            }
        }]
    }


    var optionsBar = {
        series: [{
            data: [
                <?php foreach($data_mata_pelajaran as $item) { ?>
                    <?= count($item->tugas)?>,
                <?php }?>
            ]
        }],
        chart: {
            height: 350,
            type: 'bar'
        },
        plotOptions: {
            bar: {
                columnWidth: '30%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                <?php foreach($data_mata_pelajaran as $item) {?>
                    ['<?= $item->namaMatapelajaran?>'],
                <?php }?>
            ],
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        }
    };

    var chartLine = new ApexCharts(document.querySelector("#graphLineJumlahTugas"), optionsLine);
    var chartPie = new ApexCharts(document.querySelector("#graphPieJumlahTugas"), optionsPie);
    var chartBar = new ApexCharts(document.querySelector("#graphBarMatapelajaran"), optionsBar);

    chartLine.render();
    chartPie.render();
    chartBar.render();
</script>
@endsection