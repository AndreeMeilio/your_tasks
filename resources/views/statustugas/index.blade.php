@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('setStatusColorProses') }}">
    @csrf
    <div class="card">

        <div class="card-body d-none d-lg-inline">
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg-6"><div class="wheel" id="sudah_diselesaikan"></div></div>
                    <input type="text" name="sudah_diselesaikan" class="d-none d-lg-none" id="sudah_diselesaikan_val" value="{{ $data_status[0]->colorStatustugas }}">
                </div>
                <div class="col-lg-6">
                    <div class="wheel" id="belum_dikerjakan"></div>
                    <input type="text" name="belum_dikerjakan" class="d-none d-lg-none" id="belum_dikerjakan_val" value="{{ $data_status[1]->colorStatustugas }}">
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-lg-6">
                    <table class="table"><tr id="sudah_diselesaikan_tabel" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[0]->colorStatustugas }}"><td>Status</td><td>Sudah Dikerjakan</td></tr></table>
                </div>
                <div class="col-lg-6">
                    <table class="table"><tr id="belum_dikerjakan_tabel" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[1]->colorStatustugas }}"><td>Status</td><td>Belum Dikerjakan</td></tr></table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="wheel" id="batas_waktu_terlewat"></div>
                    <input type="text" name="batas_waktu_terlewat" class="d-none d-lg-none" id="batas_waktu_terlewat_val" value="{{ $data_status[2]->colorStatustugas }}">
                </div>
                <div class="col-lg-6">
                    <div class="wheel" id="sudah_batas_waktu_terlewat"></div>
                    <input type="text" name="sudah_batas_waktu_terlewat" class="d-none d-lg-none" id="sudah_batas_waktu_terlewat_val" value="{{ $data_status[3]->colorStatustugas }}">
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-lg-6">
                    <table class="table"><tr id="batas_waktu_terlewat_tabel" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[2]->colorStatustugas }}"><td>Status</td><td>Batas Waktu Terlewat</td></tr></table>
                </div>
                <div class="col-lg-6">
                    <table class="table"><tr id="sudah_batas_waktu_terlewat_tabel" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[3]->colorStatustugas }}"><td>Status</td><td>Sudah Dikerjakan Terlambat</td></tr></table>
                </div>
            </div>
        </div>

        {{-- Tampilan Untuk Mobile --}}
        <div class="card-body d-inline d-lg-none">
            <div class="row">
                <div class="col">
                    <div class="col"><div class="wheel d-flex justify-content-center" id="sudah_diselesaikan_mobile"></div></div>
                </div>
                <div class="col">
                    <table class="table"><tr id="sudah_diselesaikan_tabel_mobile" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[0]->colorStatustugas }}"><td>Status</td><td>Sudah Dikerjakan</td></tr></table>
                </div>
            </div>
            <div class="row mb-5">
                
                <div class="col">
                    <div class="wheel d-flex justify-content-center" id="belum_dikerjakan_mobile"></div>
                </div>
                <div class="col">
                    <table class="table"><tr id="belum_dikerjakan_tabel_mobile" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[1]->colorStatustugas }}"><td>Status</td><td>Belum Dikerjakan</td></tr></table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="wheel d-flex justify-content-center" id="batas_waktu_terlewat_mobile"></div>
                </div>
                <div class="col">
                    <table class="table"><tr id="batas_waktu_terlewat_tabel_mobile" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[2]->colorStatustugas }}"><td>Status</td><td>Batas Waktu Terlewat</td></tr></table>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <div class="wheel d-flex justify-content-center" id="sudah_batas_waktu_terlewat_mobile"></div>
                </div>
                <div class="col">
                    <table class="table"><tr id="sudah_batas_waktu_terlewat_tabel_mobile" style="font-weight: bold; color: black;" bgcolor="{{ $data_status[3]->colorStatustugas }}"><td>Status</td><td>Sudah Dikerjakan Terlambat</td></tr></table>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input class="btn btn-success float-right" type="submit" value="Save Changes">
        </div>
    </div>
</form>
@endsection

@section('javascript')
    <script>
        var sudah_diselesaikan = new iro.ColorPicker("#sudah_diselesaikan", {
            width : 300,
            color : document.getElementById("sudah_diselesaikan_val").value,
        });
        var belum_dikerjakan = new iro.ColorPicker("#belum_dikerjakan", {
            width : 300, 
            color : document.getElementById("belum_dikerjakan_val").value,  
        });
        var batas_waktu_terlewat = new iro.ColorPicker("#batas_waktu_terlewat", {
            width : 300,
            color : document.getElementById("batas_waktu_terlewat_val").value,
        });
        var sudah_batas_waktu_terlewat = new iro.ColorPicker("#sudah_batas_waktu_terlewat", {
            width : 300,
            color : document.getElementById("sudah_batas_waktu_terlewat_val").value,
        });

        sudah_diselesaikan.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("sudah_diselesaikan_val").value = color.hexString;
            document.getElementById("sudah_diselesaikan_tabel").setAttribute('bgcolor', color.hexString);
        });
        belum_dikerjakan.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("belum_dikerjakan_val").value = color.hexString;
            document.getElementById("belum_dikerjakan_tabel").setAttribute('bgcolor', color.hexString);
        });
        batas_waktu_terlewat.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("batas_waktu_terlewat_val").value = color.hexString;
            document.getElementById("batas_waktu_terlewat_tabel").setAttribute('bgcolor', color.hexString);
        });
        sudah_batas_waktu_terlewat.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("sudah_batas_waktu_terlewat_val").value = color.hexString;
            document.getElementById("sudah_batas_waktu_terlewat_tabel").setAttribute('bgcolor', color.hexString);
        });

        // Setting Untuk Mobile
        var sudah_diselesaikan_mobile = new iro.ColorPicker("#sudah_diselesaikan_mobile", {
            width : 250,
            color : document.getElementById("sudah_diselesaikan_val").value,
        });
        var belum_dikerjakan_mobile = new iro.ColorPicker("#belum_dikerjakan_mobile", {
            width : 250, 
            color : document.getElementById("belum_dikerjakan_val").value,  
        });
        var batas_waktu_terlewat_mobile = new iro.ColorPicker("#batas_waktu_terlewat_mobile", {
            width : 250,
            color : document.getElementById("batas_waktu_terlewat_val").value,
        });
        var sudah_batas_waktu_terlewat_mobile = new iro.ColorPicker("#sudah_batas_waktu_terlewat_mobile", {
            width : 250,
            color : document.getElementById("sudah_batas_waktu_terlewat_val").value,
        });

        sudah_diselesaikan_mobile.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("sudah_diselesaikan_val").value = color.hexString;
            document.getElementById("sudah_diselesaikan_tabel_mobile").setAttribute('bgcolor', color.hexString);
        });
        belum_dikerjakan_mobile.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("belum_dikerjakan_val").value = color.hexString;
            document.getElementById("belum_dikerjakan_tabel_mobile").setAttribute('bgcolor', color.hexString);
        });
        batas_waktu_terlewat_mobile.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("batas_waktu_terlewat_val").value = color.hexString;
            document.getElementById("batas_waktu_terlewat_tabel_mobile").setAttribute('bgcolor', color.hexString);
        });
        sudah_batas_waktu_terlewat_mobile.on('color:change', function(color) {
            // log the current color as a HEX string
            document.getElementById("sudah_batas_waktu_terlewat_val").value = color.hexString;
            document.getElementById("sudah_batas_waktu_terlewat_tabel_mobile").setAttribute('bgcolor', color.hexString);
        });
    </script>
@endsection