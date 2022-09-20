@extends('adminlte::page')

@section('title', 'Tambah Syarat Ketentuan')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@stop
@section('content_header')
<h1 class="m-0 text-dark">Tambah Syarat Ketentuan</h1>
@stop

@section('content')
<form action="{{route('syarat-ketentuan.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul" name="judul" value="{{old('judul')}}">
                        @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Deskripsi
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <textarea id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Isi dengan deskripsi Kode Akun" name="deskripsi" value="{{old('deskripsi')}}">
                                    @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                                 </textarea>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('syarat-ketentuan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop

    @push('js')
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#summernote').summernote()
    </script>
    @endpush