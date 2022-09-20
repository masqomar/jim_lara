@extends('layouts.user')

@section ('title')
Pengajuan Pay Later
@endsection

@section ('content')

<div class="container">
    <br>

    <div class="row">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('anggota.paylater.store') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <label class="input-group">Kode Pengajuan</label>
                <select name="provider_id" class="form-control">
                    <option value="">--Pilih Provider--</option>
                    @foreach ($providerID as $provider)
                    <option value="{{$provider->id}}">{{$provider->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Nama Bank</label>
                <select name="bank_id" class="form-control">
                    <option value="">--Pilih Bank--</option>
                    @foreach ($bankID as $bank)
                    <option value="{{$bank->id}}">{{$bank->nama_bank}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Nomor Rekening</label>
                <input type="number" class="form-control" name="no_rekening" placeholder="Tuliskan no rekening" required>
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Atas Nama</label>
                <input type="text" class="form-control" name="atas_nama" placeholder="Tuliskan atas nama rekening" required>
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Nominal</label>
                <input type="number" class="form-control" name="nominal_paylater" placeholder="Tuliskan nominal harga beserta kode unik (jika ada)">
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Jangka Waktu</label>
                <input type="number" class="form-control" name="jangka_waktu" placeholder="Tuliskan jangka waktu angsuran MAX=>6">
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Catatan</label>
                <textarea type="text" class="form-control" name="catatan" placeholder="Tuliskan catatan sesuai kebutuhan kamu"></textarea>
            </div>

            <div class="form-group mb-0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="terms" class="custom-control-input">
                    <label class="custom-control-label" data-bs-toggle="modal" data-bs-target="#staticBackdrop">I agree to the <a href="#">terms of service</a>.</label>
                </div>
            </div>

            <div class="alert alert-warning">
                <div class="media">
                    <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
                    <div class="media-inner">
                        <h6 class="mb-0 font-weight-normal">
                            <small>Bisa juga topup manual (cash) melalui koperasi di New Building</small><br>
                            <small>Berlaku di jam <b>07.00 - 17.00 WIB</b></small>
                            <br><br>
                            <small>atau topup otomatis menggunakan saldo Simpanan Sukarela <a href="{{route('anggota.topup.sukarela')}}">Klik aku disini ya...</a> </small><br>
                            <small>Transaksi <b>24 jam Non-Stop</b></small>
                        </h6>
                    </div>
                </div>
            </div>
    </div>

    <button class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Ajukan Sekarang!
    </button>
    <br>
    <a href="{{route('anggota.paylater.index')}}" class="btn btn-sm btn-danger w-100 d-flex align-items-center justify-content-center">Batal</a>
</div>
<br>

@foreach ($snk as $k)
<!-- MODAL PAGE -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <font size="4" color="grey" style="font-weight:bold">{{$k->judul}}</font>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div>
                            {!! $k->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection