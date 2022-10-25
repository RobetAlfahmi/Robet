@extends('layout.admin')
@section('title','Edit Kontak')
@section('content-title','Edit Kontak')
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
                    <form method="post" enctype="multipart/form-data" action="{{route('masterkontak.update', $kontak->id )}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="jk">Jenis Kontak</label>
                         <select  class="form-select form-control" name="jenis_kontak" id="jenis_kontak">
                            @foreach ($jenis as $item)
                                @if (old('jenis_kontak', $item->jenis_kontak_id) == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->id }}></option>
                                @endif
                                <option value="{{ $item->id }}">{{ $item->jenis_kontak }}></option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="dskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ $kontak->deskripsi }}"> 
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