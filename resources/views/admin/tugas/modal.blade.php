<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <div class="col-6">: {{ $data->user->nama }}</div>
            <div class="col-6">Tugas</div>
            <div class="col-6">: {{ Str::limit($data->tugas,50) }}</div>
            <div class="col-6">Tanggal Mulai</div>
            <div class="col-6">: <span class="badge badge-success">{{ $data->tanggal_mulai }}</span></div>
            <div class="col-6">Tanggal Selesai</div>
            <div class="col-6">: <span class="badge badge-danger">{{ $data->tanggal_selesai }}</span></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
        <form action="{{ route('tugasDelete', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>