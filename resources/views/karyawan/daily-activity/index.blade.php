@extends('layouts/app')
@section('content')
 
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tasks mr-2"></i> 
    {{ $title }}
</h1>

<div class="card">
    
    <div class="card-header d-flex flex-wrap justify-content-xl-left justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="#" class="btn btn-sm btn-success mr-2">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="#" class="btn btn-sm btn-danger">
                <i class="fas fa-file-pdf mr-2"></i>
                Pdf
            </a>
        </div>
        
    </div> 

    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                      <th>No</th>
                      <th>Pemberi Tugas</th>
                      <th>Tugas</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>
                        <i class="fas fa-cog"></i>
                      </th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>Test User</td>
                        <td>{{ $data->tugas }}</td>
                        <td class="text-center">
                            <span class="badge badge-info badge-pill">{{ $data->tanggal_mulai }}</span>
                        </td>
                         <td class="text-center">
                            <span class="badge badge-danger badge-pill">{{ $data->tanggal_selesai }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('dailyActivityDetail', $data->id) }}" class="btn btn-warning btn-sm mx-1" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection