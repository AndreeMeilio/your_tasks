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

        MataPelajaran::create([
            "id" => $idMatapelajaran,
            "namaMatapelajaran" => $namaMatapelajaran,
            "deskripsiMatapelajaran" => $deskripsiMatapelajaran
        ]);

        return redirect()->route('matapelajaran');
    }


    public function show(MataPelajaran $mataPelajaran)
    {

    }
    
    
    public function edit(MataPelajaran $mataPelajaran, $idMatapelajaran)
    {
        $mata_pelajaran = MataPelajaran::where('id', $idMatapelajaran)
                                ->first();

        var_dump($mata_pelajaran);
        die();
    }

    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        //
    }


    public function destroy(MataPelajaran $mataPelajaran)
    {
        //
    }
}
