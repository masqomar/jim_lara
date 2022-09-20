@extends('adminlte::page')

@section('title', 'Tambah Bank')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Bank</h1>
@stop

@section('content')
<form action="{{route('bank.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Kode Bank</label>
                        <input type="text" class="form-control @error('kode_bank') is-invalid @enderror" placeholder="Kode Bank" name="kode_bank" value="{{old('kode_bank')}}">
                        @error('kode_bank') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" placeholder="Nama Bank" name="nama_bank" value="{{old('nama_bank')}}">
                        @error('nama_bank') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('bank.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop