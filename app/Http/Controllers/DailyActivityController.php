<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DailyActivityController extends Controller
{
    //
    public function index()
    {
        $tugas = Auth::user()->tugas;
        $data = array(
            'title' => 'Daily Activity',
            'menuDailyActivity' => 'active',
            'datas' => $tugas,
        );
        return view('karyawan.daily-activity.index', $data);
    }

    public function show($id) {
        $tugas = Auth::user()->tugas->where('id', $id)->first();
        $data = array(
            'title' => 'Daily Activity Detail',
            'menuDailyActivity' => 'active',
            'tugas' => $tugas,
        );
        return view('karyawan.daily-activity.detail', $data);
    }
}
