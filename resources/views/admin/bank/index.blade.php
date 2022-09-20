@extends('adminlte::page')

@section('title', 'Data Bank Provider')

@section('content_header')
<h1 class="m-0 text-dark">Data Bank Provider</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('bank-create')
                <a href="{{route('bank.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Bank</th>
                            <th>Nama Bank</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bank as $key => $b)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$b->kode_bank}}</td>
                            <td>{{$b->nama_bank}}</td>
                            <td>@can('bank-edit')
                                <a href="{{route('bank.edit', $b)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
</script>
@endpush