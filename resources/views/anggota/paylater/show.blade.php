@extends('layouts.user')

@section ('title')
Detail Pengajuan Paylater
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Detail Pengajuan Paylater<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('anggota.paylater.index')}}" role="button">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <tbody>
                    @foreach ($detailPaylaters as $detailPaylater)
                    <tr>
                        <th scope="col">Kode</th>
                        <td>{{$detailPaylater->kode_paylater}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Anggota</th>
                        <td>{{Auth::user()->nama}}</td>
                    </tr>
                    <tr>
                        <th scope="col">No Anggota</th>
                        <td>{{Auth::user()->no_anggota}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nominal</th>
                        <td>@rupiah($detailPaylater->nominal_paylater)</td>
                    </tr>
                    <tr>
                        <th scope="col">Provider</th>
                        <td>{{$detailPaylater->paylaterProvider->nama}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Bank</th>
                        <td>{{$detailPaylater->bank->kode_bank}} || {{$detailPaylater->bank->nama_bank}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Pengajuan</th>
                        <td>{{$detailPaylater->tanggal_pengajuan}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Keterangan</th>
                        <td>{{$detailPaylater->catatan}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td>{{$detailPaylater->status}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Bukti Transfer</th>
                        <td>
                            <img src="{{ asset('/images/bukti_transfer/'.$detailPaylater->bukti_bayar) }}" class="rounded" style="width: 150px">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>

</div>
@endsection