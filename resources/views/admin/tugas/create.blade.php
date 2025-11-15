@extends('layouts/app')
@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
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
        <form action="{{ route('tugasStore') }}" method="POST">
            @csrf
            <!-- dummy field agar chrome berhenti autocomplete -->
            <input type="text" name="email" autocomplete="off" style="display:none;">

            <div class="col-xl-12 position-relative mb-2 px-0">

                <label for="searchUser"><span class="text-danger">*</span> Nama :</label>
                <input type="text" id="searchUser" autocomplete="off" class="form-control">

                <input type="hidden" name="user_id" id="selectedUserId">

                <div id="userList" class="list-group position-absolute w-100"
                    style="z-index: 999; display:none;"></div>
                @error('user_id')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror
            </div>
            <div class="col-xl-12 mb-2 px-0">
                <label for="inputTugas"><span class="text-danger">*</span> Tugas :</label>
                <textarea name="tugas" id="inputTugas" class="form-control @error('tugas') is-invalid @enderror">{{ old('tugas')  }}</textarea>
                @error('tugas')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror
            </div>
            <div class="col-12 mb-2 px-0">
                <label for="tanggal_mulai"><span class="text-danger">*</span>Tanggal Mulai :</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}">
                @error('tanggal_mulai')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror
            </div>
            <div class="col-12 mb-2 px-0">
                <label for="tanggal_selesai">Tanggal Selesai :</label>
                <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai') }}">
                @error('tanggal_selesai')
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">
                <i class="fas fa-save mr-2"></i>
                Simpan
            </button>

    </div>
</div>

@endsection