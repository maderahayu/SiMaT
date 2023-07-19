<?php

namespace App\Http\Controllers;

use App\Models\Pemagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class SupervisorController extends Controller
{
    //
    public function daftarAnakMagang() {
        $anakMagang = DB::table('tblPemagang')->get();
        return view('supervisor.daftar', ['magang' =>$anakMagang]);
    }

    public function editAnakMagang(String $id) {
        $anakMagang = DB::table('tblPemagang')->where('pemagangId', '=', $id)->get();
        // dd($anakMagang);
        return view('supervisor.edit', ['magang' =>$anakMagang]);
    }
    
    public  function delete(String $userId) {
        $magang = Pemagang::where('userId', $userId)->get();
        // dd($magang);

        //delete image
        // Storage::delete('public/storage/image/'. $magang->fotoProfil);
// 
        //delete post
        $magang->each->delete();

        return redirect()->route('sup.daftarList')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
