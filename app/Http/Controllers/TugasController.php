<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\MataPelajaran;
use App\Models\Status;
use Illuminate\Http\Request;

class TugasController extends Controller
{

    public function index($idMatapelajaran)
    {
        $data_mata_pelajaran = MataPelajaran::all();
        $data_status = Status::all();

        $data_tugas = Tugas::where('matapelajaran_id', $idMatapelajaran)
                            ->with('statustugas')
                            ->get();


        return view('tugas.index', ['data_mata_pelajaran' => $data_mata_pelajaran, 'idMatapelajaran' => $idMatapelajaran, 'data_tugas' => $data_tugas, 'data_status' => $data_status]);
    }

    public function tandai_terselesaikan(Request $request)
    {
        $tugas = Tugas::where('id', $request->idTugas)->first();
                                        
        if (date('Y-m-d') > $tugas->tanggaldeadlineTugas){
            $statustugas = Status::where('aliasStatustugas', 'sudah_batas_waktu_terlewat')->first();
        } else {
            $statustugas = Status::where('aliasStatustugas', 'sudah_dikerjakan')->first();
        }

        $update_status_tugas = $tugas->update(['statustugas_id' => $statustugas->id]);

        $nama_tugas = Tugas::where('id', $request->idTugas)
                            ->first()
                            ->namaTugas;

        $messageSuccess = "";
        $messageFailed = "";

        if ($update_status_tugas){
            $messageSuccess = "Data tugas dengan nama tugas $nama_tugas berhasil ditandai sebagai sudah dikerjakan";
        } else {
            $messageFailed = "Data tugas dengan nama tugas $nama_tugas tidak bisa ditandai sebagai sudah dikerjakan";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }

    public function create($idMatapelajaran)
    {
        $data_mata_pelajaran = MataPelajaran::all();

        return view('tugas.create', ['data_mata_pelajaran' => $data_mata_pelajaran, 'idMatapelajaran' => $idMatapelajaran]);
    }


    public function store(Request $request)
    {
        $status_id = Status::where('aliasStatustugas', 'belum_dikerjakan')->first();

        $idTugas = uniqid('tgs');
        $idMatapelajaran = $request->idMatapelajaran;

        $tambah_tugas = Tugas::create([
            "id" => $idTugas,
            "matapelajaran_id" => $idMatapelajaran,
            "namaTugas" => $request->input('namaTugas'),
            "deskripsiTugas" => $request->input('deskripsiTugas'),
            "guruBersangkutan" => $request->input('guruBersangkutan'),
            "tanggaldiberiTugas" => date('Y-m-d', strtotime($request->input('tanggaldiberiTugas'))),
            "tanggaldeadlineTugas" => date('Y-m-d', strtotime($request->input('tanggaldeadlineTugas'))),
            "tempatpengumpulanTugas" => $request->input('tempatpengumpulanTugas'),
            "statustugas_id" => $status_id->id
        ]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($tambah_tugas){
            $messageSuccess = "Data Tugas Berhasil Ditambah";
        } else {
            $messageFailed = "Data Tugas Gagal Ditambah";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }


    public function show(Tugas $tugas)
    {
        
    }


    public function edit(Request $request)
    {
        $data_mata_pelajaran = MataPelajaran::all();

        $tugas = Tugas::where('id', $request->idTugas)->first();

        return view('tugas.edit', ['data_mata_pelajaran' => $data_mata_pelajaran, 'tugas' => $tugas, 'idMatapelajaran' => $request->idMatapelajaran]);
    }


    public function update(Request $request)
    {
        $edit_tugas = Tugas::where('id', $request->idTugas)
                        ->update([
                            "namaTugas" => $request->input('namaTugas'),
                            "deskripsiTugas" => $request->input('deskripsiTugas'),
                            "guruBersangkutan" => $request->input('guruBersangkutan'),
                            "tanggaldiberiTugas" => $request->input('tanggaldiberiTugas'),
                            "tanggaldeadlineTugas" => $request->input('tanggaldeadlineTugas'),
                            "tempatpengumpulanTugas" => $request->input('tempatpengumpulanTugas'),
                        ]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($edit_tugas){
            $messageSuccess = "Data Tugas Berhasil Diedit";
        } else {
            $messageFailed = "Data Tugas Gagal Diedit";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }


    public function destroy(Request $request)
    {
        $tugas = Tugas::find($request->input('idTugas'));

        $hapus_tugas = $tugas->delete();

        $messageSuccess = "";
        $messageFailed = "";

        if ($hapus_tugas){
            $messageSuccess = "Data Tugas Berhasil Dihapus";
        } else {
            $messageFailed = "Data Tugas Gagal Dihapus";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }
}
