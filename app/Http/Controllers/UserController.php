<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Data User',
            'menuAdminUser' => 'active',
            'users' => User::get(),
        );
        return view('admin/user/index',$data);
    }

    public function create(){
        $data = array(
            'title' => 'Tambah Data User',
            'menuAdminUser' => 'active',
        );
        return view('admin/user/create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'jabatan' => 'required|string|max:100',
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);


        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->password),
            'is_tugas' => false,
        ]);

        return redirect()->route('user')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $data = array(
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user' => $user,
        );
        return view('admin/user/edit',$data);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'jabatan' => 'required|string|max:100',
        ],
        [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jabatan.required' => 'Jabatan wajib diisi.',
        ]);

        if($request->password != null && $request->password !== ''){
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ],
            [
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            ]);

            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('user')->with('success', 'Data user berhasil diperbarui.');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'User berhasil dihapus.');
    }

}
