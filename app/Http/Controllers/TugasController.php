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

    // public function get($idMatapelajaran, $idStatustugas = null)
    // {
    //     if ($idStatustugas != null){
    //         $data_tugas = Tugas::where('idMatapelajaran', $idMatapelajaran)
    //                                 ->where('idStatustugas', $idStatustugas)
    //                                 ->get();
    //     } else {
    //         $data_tugas = Tugas::where('idMatapelajaran', $idMatapelajaran)->get();
    //     }

    //     return response()->json($data_tugas);
    // }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
        
    }


    public function show(Tugas $tugas)
    {
        
    }


    public function edit(Tugas $tugas)
    {
        
    }


    public function update(Request $request, Tugas $tugas)
    {
        
    }


    public function destroy(Tugas $tugas)
    {
        
    }
}
