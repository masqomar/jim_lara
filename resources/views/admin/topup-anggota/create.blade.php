@extends('adminlte::page')

@section('title', 'Top Up Anggota')

@section('content_header')
<h1 class="m-0 text-dark">Top Up Anggota</h1>
@stop

@section('content')
<form action="{{route('topup-anggota.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <th>Nama Anggota</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="user_id">
                                        <option value="" selected disabled>Pilih Anggota</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nama}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="nominal_topup" value="10000" class="form-control"></td>
                                <td>
                                    <select class="form-control" name="user_id">
                                        <option value="Voucher Bulanan" selected>Voucher Bulanan</option>
                                        @foreach($users as $user)
                                        <option value="Topup Cash">Topup Cash / TF</option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <button type="submit" class="btn btn-primary pull-right">Submit</button>

                </div>
            </div>
        </div>
    </div>
    @stop