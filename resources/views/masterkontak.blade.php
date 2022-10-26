@extends('layout.admin')
@section('title','Master Kontak')
@section('content-title','Master Kontak')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="row">
  <div class="col-lg-5">
      <div class="card shadow mb-4">
          <div class="card-header py-3" style="background: pink;">
          <h6 class="m-0 font-weight-bold text-dark"><b>Data Siswa</b></h6>
          </div>
          <div class="card-body">
              <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nisn</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)    
                        <tr>
                          <td>{{ $item -> nisn }}</td>
                          <td>{{ $item -> nama }}</td>
                          <td>
                               <a class="btn btn-info" onclick="show({{ $item->id }})" ><i class="fas fa-folder-open"></i></a>
                               <a href="/masterkontak/create/{{  $item->id }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
                          </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
                <div class="card-footer d-flex justify-content-end">
                  {{ $data->links() }}
                </div>
          </div>
      </div>
  </div>
  {{-- info bary --}}
  <div class="col-lg-7">
      <div class="card shadow mb-4">
          <div class="card-header" style="background: pink;">
              <h6 class="m-0 font-weight-bold text-dark"><b>Kontak Siswa</b></h6>
          </div>
          <div class="card-body" id="kontak">
            <h6 class="text-center" >Tidak ada data yang dipilih</h6>
          </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3" style="background: pink;">
        <h6 class="m-0 font-weight-bold text-dark"><b>Jenis Kontak</b></h6>
        </div>
        <div class="card-body">
          
          <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah Jenis Kontak
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Jenis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ url('masterkontak/tambah') }}" method="post">
              
              @csrf
            <div class="modal-body">
              <span>Jenis Kontak</span>
              <input type="text" class="form-control mt-1 py-3" name="jenis_kontak"
               style="font-size13px;" require>
            </div>
            <div class="modal-footer py-2">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
          
  </div>
</div>

<script>
  function show(id){
    $.get('masterkontak/'+id, function(data){
      $('#kontak').html(data);
    });
  }
</script>



@endsection