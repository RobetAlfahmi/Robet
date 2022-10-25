@extends('layout.admin')
@section('title','Edit Project')
@section('content-title','Edit Project')
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
                    <form method="post" enctype="multipart/form-data" action="{{route('masterproject.update', $project->id )}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="siswa_id" value="{{$project->siswa_id}}">
                        <div class="form-group">
                            <label for="nama_projects">Nama Project</label>
                            <input type="text" class="form-control" id="nama_porjects" name='nama_projects' value="{{ $project->nama_projects }}">
                        </div>
                        <div class="form-group">
                            <label for="dskripsi">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name='deskripsi'>{{ $project->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                 </form> 
            </div>
        </div>
    </div>              
</div>

@endsection