@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('layouts.nav')

    <div class="card">
        <div class="card-body bg-light pt-4 pb-4 row">
            @foreach($magang as $mg)
            <div class="col-md-5">
                <img src="{{ asset('storage/images/'.$mg->fotoProfil) }}" class="rounded" height="80%" width="80%" alt="...">
                <div class="col-md-8 pt-3">
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <div class="col-md-6 pt-1">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{$mg->namaPemagang}}" placeholder="Masukkan nama anda..." require>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{$mg->email}}" placeholder="Masukkan email anda ..." require disabled>
                    </div>
                    <div class="mb-3">
                        <label for="univ" class="form-label">Universitas</label>
                        <input type="text" class="form-control" value="{{$mg->namaUniversitas}}" placeholder="Masukkan universitas anda ..." require>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{$mg->noTelp}}" placeholder="Masukkan universitas anda ..." require>
                    </div>
                    <div class="mb-3">
                        <label for="tglMulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" value="{{$mg->tglMulai}}" require>
                    </div>
                    <div class="mb-3">
                        <label for="tglSelesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" value="{{$mg->tglSelesai}}" require>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                @endforeach
            </div>


        </div>
    </div>
    
    @include('layouts.logoutModels')
</div>
@endsection