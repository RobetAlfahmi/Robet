@extends('layout.admin')
@section('title','Show Siswa')
@section('content-title','Show Siswa')
@section('content')
    <div class="row">
        {{-- kartu satu --}}
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    {{-- <img src="https://kwikku.us/uploads/public/images/listicle/content/73749-listicle-20180308101728.jpg" alt="aaa" width="200" height="200" class=" rounded-circle "> --}}
                     <img src="{{ asset('/template/img/'.$siswa->foto) }}"width="200" height="200" class=" rounded-circle" >
                    <h4>{{ $siswa->nama }}</h4>
                    <h6><i class="fas fa-id-card"></i> {{ $siswa->nisn }}</h6>
                    <h6><i class="fas fa-beer"></i> {{ $siswa->jk }}</h6>
                    <h6><i class="fas fa-bug"></i> {{ $siswa->alamat }}</h6>
                </div>    
             </div>
             {{-- Kartu kedua --}}
             <div class="card shadow mb-4">
                <div class="card-header bg-gradient-danger">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-user-plus"></i> Kontak Siswa</h6>
                </div>
                <div class="card-body text-center">
                    @foreach ($kontaks as $kontak)
                        <li>{{ $kontak->jenis_kontak }} : {{ $kontak->pivot->deskripsi}}</li>
                    @endforeach
                </div>    
             </div>
        </div>
        {{-- Kartu ketiga --}}
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-info"> 
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-quote-left"></i> About Siswa</h6>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote text-center">
                    <p class="mb-8">{{ $siswa->about }}</p>
                    <footer class="block-footer">Ditulis Oleh <cite title="Source Ttile">{{ $siswa->nama }}</cite></footer>
                    </blockquote>
                </div>
            </div>
            {{-- Kartu keempat --}}
            <div class="card shadow mb-4">
                <div class="card-header bg-gradient-warning">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-tasks"></i> Project Siswa</h6>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection