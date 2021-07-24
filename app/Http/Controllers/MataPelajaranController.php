<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class MataPelajaranController extends Controller
{

    public function index()
    {
        $data_mata_pelajaran = MataPelajaran::all();

        return view('matapelajaran.index', ['data_mata_pelajaran' => $data_mata_pelajaran]);
    }


    public function create()
    {
        $data_mata_pelajaran = MataPelajaran::all();

        return view('matapelajaran.create', ['data_mata_pelajaran' => $data_mata_pelajaran]);
    }


    public function store(Request $request)
    {

        $idMatapelajaran = uniqid('mp');
        $namaMatapelajaran = $request->input('namaMataPelajaran');
        $deskripsiMatapelajaran = $request->input('deskripsiMataPelajaran');

        $tambah_mata_pelajaran = MataPelajaran::create([
            "id" => $idMatapelajaran,
            "namaMatapelajaran" => $namaMatapelajaran,
            "deskripsiMatapelajaran" => $deskripsiMatapelajaran
        ]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($tambah_mata_pelajaran){
            $messageSuccess = "$namaMatapelajaran Berhasil Ditambah Kedalam Mata Pelajaran";
        } else {
            $messageFailed = "$namaMatapelajaran Gagal Ditambah Kedalam Mata Pelajaran";
        }

        return redirect(route('matapelajaran'))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }


    public function show(MataPelajaran $mataPelajaran)
    {

    }
    
    
    public function edit(MataPelajaran $mataPelajaran, $idMatapelajaran)
    {
        $data_mata_pelajaran = MataPelajaran::all();

        $mata_pelajaran = MataPelajaran::where('id', $idMatapelajaran)
                                ->first();

        return view('matapelajaran.edit', ['data_mata_pelajaran' => $data_mata_pelajaran ,'mata_pelajaran' => $mata_pelajaran]);
    }

    public function update(Request $request)
    {
        $idMatapelajaran = $request->idMatapelajaran;

        $update_mata_pelajaran = MataPelajaran::where('id', $idMatapelajaran)
                                                ->update([
                                                    'namaMatapelajaran' => $request->input("namaMataPelajaran"),
                                                    'deskripsiMatapelajaran' => $request->input("deskripsiMataPelajaran")
                                                ]);

        $messageSuccess = "";
        $messageFailed = "";

        if ($update_mata_pelajaran){
            $messageSuccess = "Edit Data Mata Pelajaran Berhasil";
        } else {
            $messageFailed = "Edit Data Mata Pelajaran Gagal";
        }

        return redirect(route('matapelajaran'))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }


    public function destroy(Request $request)
    {
        $mata_pelajaran = MataPelajaran::find($request->input('idMatapelajaran'));

        $hapus_mata_pelajaran = $mata_pelajaran->delete();

        $messageSuccess = "";
        $messageFailed = "";

        if ($hapus_mata_pelajaran){
            $messageSuccess = "Data Mata Pelajaran Berhasil Dihapus";
        } else {
            $messageFailed = "Data Mata Pelajaran Gagal Dihapus";
        }

        return redirect(route('matapelajaran'))->with(['success' => $messageSuccess, 'failed' => $messageFailed]);
    }
}
