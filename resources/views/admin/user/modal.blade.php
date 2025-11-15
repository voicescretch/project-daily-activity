<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="row">
            <div class="col-6">Nama</div>
            <div class="col-6">: {{ $user->nama }}</div>
            <div class="col-6">Email</div>
            <div class="col-6">: <span class="badge badge-primary">{{ $user->email }}</span></div>
            <div class="col-6">Jabatan</div>
            <div class="col-6">: 
                @if ($user->jabatan == 'Admin')
                <span class="badge badge-dark">{{ $user->jabatan }}</span>
                @else
                <span class="badge badge-info">{{ $user->jabatan }}</span>
                @endif
            </div>
            <div class="col-6">Status</div>
            <div class="col-6">: 
                @if ($user->is_tugas == false)
                <span class="badge badge-danger">Belum Ditugaskan!</span>
                @else
                <span class="badge badge-success">Sudah Ditugaskan</span>
                @endif
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
        <form action="{{ route('userDelete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>