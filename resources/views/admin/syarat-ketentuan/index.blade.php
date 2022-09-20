@extends('adminlte::page')

@section('title', 'Data Syarat Ketentuan')

@section('content_header')
<h1 class="m-0 text-dark">Data Syarat Ketentuan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('syarat-ketentuan-create')
                <a href="{{route('syarat-ketentuan.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($syaratKetentuan as $key => $snk)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$snk->judul}}</td>
                            <td>{{Str::limit( strip_tags($snk->deskripsi), 50 )}}</td>
                            <td>
                                @can('syarat-ketentuan-edit')
                                <a href="{{route('syarat-ketentuan.edit', $snk)}}" class="btn btn-primary btn-xs">
                                    Proses
                                </a>
                                @endcan
                                @can('syarat-ketentuan-delete')
                                <a href="{{route('syarat-ketentuan.destroy', $snk)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                                @endcan

                                <a href="{{route('syarat-ketentuan.show', $snk->id)}}" class="btn btn-info btn-xs">
                                    Detail
                                </a>
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush