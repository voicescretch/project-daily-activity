<?php

namespace App\Http\Controllers;

use App\Models\User;
use \App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Tugas',
            'menuAdminTugas' => 'active',
            'datas' => Tugas::with('user:id,nama')->get(),
        );
        return view('admin/tugas/index', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('q');

        $users = User::where('is_tugas', false)->where('jabatan', 'Karyawan')->where('nama', 'like', '%' . $keyword . '%')
            ->limit(10)
            ->get(['id', 'nama']);

        return response()->json($users);
    }

    public function create()
    {
        $users = User::all()->sortBy('nama');

        $data = array(
            'title' => 'Tambah Tugas',
            'menuAdminTugas' => 'active',
        );
        return view('admin/tugas/create', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'tugas' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $tugas = new Tugas();
        $tugas->user_id = $request->input('user_id');
        $tugas->tugas = $request->input('tugas');
        $tugas->tanggal_mulai = $request->input('tanggal_mulai');
        $tugas->tanggal_selesai = $request->input('tanggal_selesai');
        $tugas->save();

        $user = User::find($tugas->user_id);
        $user->is_tugas = 1;
        $user->save();

        return redirect()->route('tugas')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tugas = Tugas::with('user:id,nama')->findOrFail($id);

        $data = array(
            'title' => 'Edit Tugas',
            'menuAdminTugas' => 'active',
            'tugas' => $tugas,
        );
        return view('admin/tugas/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'tugas' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->user_id = $request->input('user_id');
        $tugas->tugas = $request->input('tugas');
        $tugas->tanggal_mulai = $request->input('tanggal_mulai');
        $tugas->tanggal_selesai = $request->input('tanggal_selesai');
        $tugas->save();

        return redirect()->route('tugas')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function delete($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas')->with('success', 'Tugas berhasil dihapus.');
    }
}
