
@if ($projects->isEmpty())
    <h6 class="text-center">Siswa Belum Memiliki Project</h6>
@else
@foreach ($projects as $item)
<div class="card mb-3">
    <div class="card-header"  style="background: rgb(129, 219, 255);">
        <strong><b>{{ $item->nama_projects }}</b></strong>
    </div>
    <div class="card-body m-0">
        <b>Tanggal : {{ $item->tanggal }}</b>
        <p>Deskripsi : {{ $item->deskripsi }}</p>
    </div>
    <div class="card-footer">
        <form action="/masterproject/{{ $item->id }}" method="post" class="d-inline-flex">
            @method('delete')
            @csrf
        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-eraser"></i></button>
        </form>
            <a class="btn-btn" href="/masterproject/{{ $item->id }}/edit" style="text-decoration: none;">
               <span class="btn btn-success btn-sm" style="border-radius: 3px;">
                    <i class="fas fa-edit"></i>
               </span>
            </a>
    </div>
</div>
@endforeach   
@endif
