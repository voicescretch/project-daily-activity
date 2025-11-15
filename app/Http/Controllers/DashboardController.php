<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->jabatan == 'Admin') {
            $userCount = User::count();
            $datas = $userCount;
            $data = array(
                "title" => "Dashboard",
                "menuDashboard" => "active",
                "datas" => $datas
            );
        } else {
            $tugasCount = Auth::user()->tugas->count();
            $datas = $tugasCount;
            $data = array(
                "title" => "Dashboard",
                "menuDashboard" => "active",
                "datas" => $datas,
            );
        }
        return view('dashboard', $data);
    }
}
