<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SupervisorController extends Controller
{
    //
    public function daftarAnakMagang() {
        $anakMagang = DB::table('tblPemagang')->get();
        // $anakMagang = DB::table('users')->select('id')->where('type', '=', false)->get();
        // $anakMagang = DB::table('tblPemagang')->where('userId', '=', $anakMagang)->get();
        // dd($anakMagang);
        return view('supervisor.daftar', ['magang' =>$anakMagang]);
    }

    public function edit(String $id) {
        $anakMagang = DB::table('tblPemagang')->where('pemagangId', '=', $id)->get();
        return view('supervisor.edit', ['magang' =>$anakMagang]);
    }
}
