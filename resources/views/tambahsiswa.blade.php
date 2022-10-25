@extends('layout.admin')
@section('title','Tambah Siswa')
@section('content-title','Tambah Siswa')
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
                        <form method="post" enctype="multipart/form-data" action="{{route('mastersiswa.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name='nama' value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label for="nisn">Nisn</label>
                                <input type="text" class="form-control" id="nisn" name='nisn' value="{{ old('nisn') }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name='alamat' value="{{ old('alamat') }}">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                             <select  class="form-select form-control" name="jk" id="jk">
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Siswa</label>
                                <input type="file" class="form-control-file" id="foto" name='foto' value="{{ old('foto') }}">
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea type="text" class="form-control" id="nama" name='about' value="{{ old('about') }}"></textarea>
                            </div>
                            <div class="form-group">
                                {{-- <a type="submit" class="btn btn-success">Simpen</a> --}}
                                <input type="submit" class="btn btn-success" value="Simpen">
                                <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                     </form> 
                </div>
            </div>
        </div>              
    </div>

@endsection