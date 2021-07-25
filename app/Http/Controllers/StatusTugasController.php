<?php

namespace App\Http\Controllers;

use App\Models\StatusTugas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class StatusTugasController extends Controller
{

    public function index()
    {
       $data_mata_pelajaran = MataPelajaran::all();

       $data_status = StatusTugas::all();

       return view('statustugas.index', ['data_mata_pelajaran' => $data_mata_pelajaran, 'data_status' => $data_status]);
    }

    public function setStatusColor(Request $request)
    {

        $data_status = StatusTugas::all();

        $update_warna_sudah_dikerjakan = $data_status[0]->update(['colorStatustugas' => $request->input('sudah_diselesaikan')]);
        $update_warna_belum_dikerjakan = $data_status[1]->update(['colorStatustugas' => $request->input('belum_dikerjakan')]);
        $update_warna_batas_waktu_terlewat = $data_status[2]->update(['colorStatustugas' => $request->input('batas_waktu_terlewat')]);
        $update_warna_sudah_batas_waktu_terlewat = $data_status[3]->update(['colorStatustugas' => $request->input('sudah_batas_waktu_terlewat')]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($update_warna_sudah_dikerjakan && $update_warna_belum_dikerjakan && $update_warna_batas_waktu_terlewat && $update_warna_sudah_batas_waktu_terlewat){
            $messageSuccess = "Warna Status Tugas Berhasil Diperbarui";
        } else {
            $messageFailed = "Terdapat Beberapa Warna Status Tugas Yang Gagal Diperbarui";
        }

        return redirect(route('setStatusColor'))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }
}
