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