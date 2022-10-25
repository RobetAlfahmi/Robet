@extends('layout.admin')
@section('title','Edit Kontak')
@section('content-title','Edit Kontak')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>    
                @endif
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ url('masterkontak/store', $siswa->id )}}" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{$siswa->id}}">
                        <div class="form-group">
                            <label for="jk">Jenis Kontak</label>
                         <select  class="form-select form-control" name="jenis_kontak" id="jenis_kontak">
                            <option disabled selected>Pilih</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis_kontak }}></option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi'> 
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('masterkontak.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                 </form> 
            </div>
        </div>
    </div>              
</div>

@endsection