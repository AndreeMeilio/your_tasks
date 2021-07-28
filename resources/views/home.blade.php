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
                        <div class="h2 mb-0 font-weight-bold text-gray-800">15</div>
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
                        <div class="h2 mb-0 font-weight-bold text-gray-800">11</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
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
                <tr>
                    <td>PWPB</td>
                    <td>14</td>
                </tr>
                <tr>
                    <td>Matematika</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Bahasa Indonesia</td>
                    <td>9</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4 mb-4">
    <div class="card-body">
        <div id="graphBarMatapelajaran"></div>
    </div>
</div>

@endsection

@section('javascript')
<script>
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
            type: 'polarArea'
        },
        series: [8, 7, 6, 5],
        labels: ['Selesai', 'Belum Dikerjakan', 'Terlambat', 'Selesai Terlambat'],
        stroke: {
            colors: ['#fff']
        },
        fill: {
            opacity: 0.7
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
            data: [21, 22, 10, 5, 11, 3, 6, 21, 16, 7, 12]
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
                ['PBO'],
                ['BD'],
                ['PWPB'],
                ['PKK'],
                ['B. Indonesia'],
                ['B. Sunda'],
                ['B. Inggris'],
                ['B. Jepang'],
                ['Matematika'],
                ['PAI'],
                ['PKN']
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