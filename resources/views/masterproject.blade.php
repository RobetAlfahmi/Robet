@extends('layout.admin')
@section('title','Master Project')
@section('content-title','Master Project')
@section('content')

  @if (Session::has('message'))
  <div class="alert alert-success">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert">-</button>
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
                                 <a class="btn btn-info" onclick="show({{$item->id }})" ><i class="fas fa-folder-open"></i></a>
                                 <a href="{{ route('masterproject.tambah', $item->id) }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
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
                <h6 class="m-0 font-weight-bold text-dark"><b>Project Siswa</b></h6>
            </div>
            <div class="card-body" id="project">
              <h6 class="text-center" >Tidak ada data yang dipilih</h6>
            </div>
        </div>
    </div>
</div>

  <script>
    function show(id){
      $.get('masterproject/'+id, function(data){
        $('#project').html(data);
      });
    }
  </script>

@endsection