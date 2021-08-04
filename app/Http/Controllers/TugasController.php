<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tugas;
use App\Models\MataPelajaran;
use App\Models\StatusTugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{

    public function index($idMatapelajaran)
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();
        $data_status = StatusTugas::all();

        $tugas_belum_dikerjakan = Tugas::where('statustugas_id', $data_status[1]->id)->get();

        foreach($tugas_belum_dikerjakan as $item){
            if (date('Y-m-d') > $item->tanggaldeadlineTugas){
                $item->update(['statustugas_id' => $data_status[2]->id]);
            }
        }

        $data_tugas = Tugas::where('matapelajaran_id', $idMatapelajaran)
                            ->orderBy('tugas_berbintang', 'DESC')
                            ->with('statustugas')
                            ->get();
        
        return view('tugas.index', ['data_mata_pelajaran' => $data_mata_pelajaran, 'idMatapelajaran' => $idMatapelajaran, 'data_tugas' => $data_tugas, 'data_status' => $data_status]);
    }

    public function kalendar_mode($idMatapelajaran)
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();
        $data_status = StatusTugas::all();

        $data_tugas = Tugas::where('matapelajaran_id', $idMatapelajaran)->get();

        return view('tugas.mode-kalendar.index', ['data_mata_pelajaran' => $data_mata_pelajaran, 'idMatapelajaran' => $idMatapelajaran, 'data_tugas' => $data_tugas, 'data_status' => $data_status]);
    }

    public function tugasBerbintang()
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();

        $data_tugas = Tugas::where('users_id', Auth::user()->id)
                            ->where('tugas_berbintang', 2)
                            ->with('matapelajaran', 'statustugas')
                            ->get();


        return view('tugas.tugas_berbintang', ['data_mata_pelajaran' => $data_mata_pelajaran, 'data_tugas' => $data_tugas]);
    }

    public function getTugasPerstatus(Request $request)
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();
        $data_status = StatusTugas::all();

        $tugas_belum_dikerjakan = Tugas::where('statustugas_id', $data_status[1]->id)->get();

        foreach($tugas_belum_dikerjakan as $item){
            if (date('Y-m-d') > $item->tanggaldeadlineTugas){
                $item->update(['statustugas_id' => $data_status[2]->id]);
            }
        }

        $data_tugas = Tugas::where('matapelajaran_id', $request->idMatapelajaran)
                            ->where('statustugas_id', $request->idStatustugas)
                            ->orderBy('tugas_berbintang', 'DESC')
                            ->with('statustugas')
                            ->get();

        if ($request->idStatustugas == "" || $request->idStatustugas == null){
            return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]));
        }
        
        return view('tugas.index', ['data_mata_pelajaran' => $data_mata_pelajaran, 'idMatapelajaran' => $request->idMatapelajaran, 'data_tugas' => $data_tugas, 'data_status' => $data_status]);
    }

    public function tandai_terselesaikan(Request $request)
    {
        $tugas = Tugas::where('id', $request->idTugas)->first();
                                        
        if (date('Y-m-d') > $tugas->tanggaldeadlineTugas){
            $statustugas = StatusTugas::where('aliasStatustugas', 'sudah_batas_waktu_terlewat')->first();
        } else {
            $statustugas = StatusTugas::where('aliasStatustugas', 'sudah_dikerjakan')->first();
        }

        $update_status_tugas = $tugas->update(['statustugas_id' => $statustugas->id]);

        $nama_tugas = Tugas::where('id', $request->idTugas)
                            ->first()
                            ->namaTugas;

        $messageSuccess = "";
        $messageFailed = "";

        if ($update_status_tugas){
            $messageSuccess = "Data tugas dengan nama tugas $nama_tugas berhasil ditandai sebagai selesai";
        } else {
            $messageFailed = "data tidak bisa ditandai sebagai selesai";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }

    public function tandai_tugas_berbintang(Request $request)
    {
        $tugas = Tugas::where('id', $request->idTugas)->first();

        $tandai_tugas_berbintang = $tugas->update(['tugas_berbintang' => 2]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($tandai_tugas_berbintang){
            $messageSuccess = "Data tugas dengan nama tugas $tugas->namaTugas berhasil ditandai sebagai tugas berbintang";
        } else {
            $messageFailed = "data tidak bisa ditandai sebagai tugas berbintang";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }

    public function tandai_tugas_berbintang_cancel(Request $request)
    {
        $tugas = Tugas::where('id', $request->idTugas)->first();

        $tandai_tugas_berbintang_cancel = $tugas->update(['tugas_berbintang' => 1]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($tandai_tugas_berbintang_cancel){
            $messageSuccess = "Data tugas dengan nama tugas $tugas->namaTugas telah dihapus dari daftar tugas berbintang";
        } else {
            $messageFailed = "data tugas tidak bisa dihapus dari daftar tugas berbintang";
        }

        return redirect(route('tugas', ['idMatapelajaran' => $request->idMatapelajaran]))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }

    public function create($idMatapelajaran)
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();

        return view('tugas.create', ['data_mata_pelajaran' => $data_mata_pelajaran, 'idMatapelajaran' => $idMatapelajaran]);
    }


    public function store(Request $request)
    {
        $status_id = StatusTugas::where('aliasStatustugas', 'belum_dikerjakan')->first();

        $idTugas = uniqid('tgs');
        $idMatapelajaran = $request->idMatapelajaran;

        $tambah_tugas = Tugas::create([
            "id" => $idTugas,
            "users_id" => Auth::user()->id,
            "matapelajaran_id" => $idMatapelajaran,
            "namaTugas" => $request->input('namaTugas'),
            "deskripsiTugas" => $request->input('deskripsiTugas'),
            "guruBersangkutan" => $request->input('guruBersangkutan'),
            "tanggaldiberiTugas" => date('Y-m-d', strtotime($request->input('tanggaldiberiTugas'))),
            "tanggaldeadlineTugas" => date('Y-m-d', strtotime($request->input('tanggaldeadlineTugas'))),
            "tempatpengumpulanTugas" => $request->input('tempatpengumpulanTugas'),
            "statustugas_id" => $status_id->id,
            "tugas_berbintang" => '1'
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
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)->get();

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
        $tugas = Tugas::find($request->idTugas);

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

    public function hapus_tugas_berdasarkan_status(Request $request)
    {
        $idStatustugas = $request->deleteIdStatustugas;

        $hapus_tugas = Tugas::where('users_id', Auth::user()->id)
                        ->where('statustugas_id', $idStatustugas)
                        ->delete();

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
