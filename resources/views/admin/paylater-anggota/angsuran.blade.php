@extends('adminlte::page')

@section('title', 'Angsuran Paylater')

@section('content_header')
<h1 class="m-0 text-dark">Angsuran Paylater</h1>
@stop

@section('content')
<form action="{{route('admin.paylater-anggota.storeAngsuran')}}" method="post">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($angsuran->status == 'Dibayar')
                    <div class="form-group">
                        <label>Kode Paylater</label>
                        <input type="text" class="form-control @error('kode_paylater') is-invalid @enderror" name="kode_paylater" value="{{$angsuran->kode_paylater ?? old('kode_paylater')}}" readonly>
                        @error('kode_paylater') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="hidden" name="user_id" value="{{$angsuran->id}}">
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="nama_anggota" value="{{$angsuran->user_id}}" readonly>
                        @error('user_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Provider</label>
                        <input type="text" class="form-control @error('paylater_provider_id') is-invalid @enderror" name="nama_anggota" value="{{$angsuran->paylater_provider_id}}" readonly>
                        @error('paylater_provider_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>Kode Pembiayaan</th>
                                <th>Jumlah Paylater</th>
                                <th>Total Angsuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$angsuran->kode_paylater}}</td>
                                <td>@rupiah($angsuran->nominal_paylater)</td>
                                <td>@rupiah($cicilan)</td>

                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" class="form-control @error('setor_bayar') is-invalid @enderror" placeholder="Nominal" name="setor_bayar" required>
                        @error('setor_bayar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Pelunasan?</label>
                        <select name="pelunasan" class="form-control @error('pelunasan') is-invalid @enderror">
                            <option value="Belum Lunas">Angsuran</option>
                            <option value="Lunas">Pelunasan</option>
                        </select>
                        @error('pelunasan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control @error('keterangan_setor') is-invalid @enderror" placeholder="Keterangan" name="keterangan_setor" required></textarea>
                        @error('keterangan_setor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class=" card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('paylater-anggota.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
                @endif

                @if ($angsuran->status === 'Lunas')
                <div class="text-center bg-danger">
                    <h3>
                        Sudah lunas ya BOS...!
                    </h3>
                </div>
                @endif
            </div>
        </div>
        @stop