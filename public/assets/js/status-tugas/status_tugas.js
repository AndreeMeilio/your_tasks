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