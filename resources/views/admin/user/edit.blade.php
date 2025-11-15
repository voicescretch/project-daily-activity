@extends('layouts/app')
@section('content')
 
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i> 
    {{ $title }}
</h1>

<div class="card">
    
    <div class="card-header">
        <a href="{{ route('user') }}" class="btn btn-sm btn-success">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali
        </a>
    </div> 

    <div class="card-body">
        <form action="{{ route('userStore') }}" method="POST">
            @csrf
        <div class="row pb-2">
            <div class="col-xl-6">
                <label for="inputNama"><span class="text-danger">*</span> Nama :</label>
                <input type="text" name="nama" id="inputNama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}">
                @error('nama')
                    <div>
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>
            <div class="col-xl-6">
                <label for="inputEmail"><span class="text-danger">*</span> Email :</label>
                <input type="email" name="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                @error('email')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
            @enderror
            </div>
        </div>
        <div class="col-12 mb-2 p-0">
            <label for="inputJabatan"><span class="text-danger">*</span> Jabatan :</label>
            <select name="jabatan" id="inputJabatan" class="form-control @error('jabatan') is-invalid @enderror">
                    <option disabled>-- Pilih Jabatan --</option>
                    <option value="Admin" {{ $user->jabatan == 'Admin' ? 'selected' : ''}}</option>Admin</option>
                    <option value="Karyawan" {{ $user->jabatan == 'Karyawan' ? 'selected' : ''}}>Karyawan</option>
            </select>
            @error('jabatan')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="row mb-2">
            <div class="col-xl-6">
                <label for="inputPassword"><span class="text-danger">*</span> password :</label>
                <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror">
            </div>
            <div class="col-xl-6">
                <label for="inputKonfirmasiPassword"><span class="text-danger">*</span> Konfirmasi Password :</label>
                <input type="password" name="password_confirmation" id="inputKonfirmasiPassword" class="form-control @error('password') is-invalid @enderror">
            </div>
            @error('password')
                <div class="mb-2">
                    <small class="text-danger">{{ $message }}</small>
                </div>
            @enderror
        </div>
        
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-2"></i>
                Simpan
            </button>

    </div>
</div>
@endsection