@extends('layout.admin')
@section('title','Tambah Project')
@section('content-title','Tambah Project - '.$siswa->nama)
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>    
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{route('masterproject.store')}}">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $siswa->id}}">
                        <div class="form-group">
                            <label for="nama_projects">Nama Project</label>
                            <input type="text" class="form-control" id="nama_projects" name='nama_projects' value="{{ old('nama_projects') }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ old('deskripsi') }}"></textarea>
                        </div>
                        <div class="form-group">
                            {{-- <a type="submit" class="btn btn-success">Simpen</a> --}}
                            <input type="submit" class="btn btn-success" value="Simpen">
                            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                 </form> 
            </div>
        </div>
    </div>              
</div>

@endsection