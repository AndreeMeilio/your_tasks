<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\MataPelajaran;
use App\Models\Tugas;
use App\Models\StatusTugas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_mata_pelajaran = MataPelajaran::where('users_id', Auth::user()->id)
                                            ->with('tugas')
                                            ->get();
        
        $data_status = StatusTugas::all();

        $tugas_sudah_dikerjakan = Tugas::where('users_id', Auth::user()->id)
                                        ->where(
                                            "statustugas_id",
                                            $data_status->where('aliasStatustugas', 'sudah_dikerjakan')->first()->id
                                        )
                                        ->with('statustugas')
                                        ->get();

        $tugas_belum_dikerjakan = Tugas::where('users_id', Auth::user()->id)
                                        ->where(
                                            "statustugas_id",
                                            $data_status->where('aliasStatustugas', 'belum_dikerjakan')->first()->id
                                        )
                                        ->with('statustugas')
                                        ->get();

        $tugas_batas_waktu_terlewat = Tugas::where('users_id', Auth::user()->id)
                                            ->where(
                                                "statustugas_id",
                                                $data_status->where('aliasStatustugas', 'batas_waktu_terlewat')->first()->id
                                            )
                                            ->with('statustugas')
                                            ->get();

        $tugas_sudah_batas_terlewat = Tugas::where('users_id', Auth::user()->id)
                                            ->where(
                                                "statustugas_id",
                                                $data_status->where('aliasStatustugas', 'sudah_batas_waktu_terlewat')->first()->id
                                            )
                                            ->with('statustugas')
                                            ->get();

        return view('home', ['data_mata_pelajaran' => $data_mata_pelajaran, 'data_status' => $data_status, 'tugas_sudah_dikerjakan' => $tugas_sudah_dikerjakan, 'tugas_belum_dikerjakan' => $tugas_belum_dikerjakan, 'tugas_batas_waktu_terlewat' => $tugas_batas_waktu_terlewat, 'tugas_sudah_batas_terlewat' => $tugas_sudah_batas_terlewat]);
    }
}
