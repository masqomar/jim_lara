@extends('adminlte::page')

@section('title', 'Detail Syarat Ketentuan')

@section('content_header')
@foreach ($snk as $k)
<h1 class="m-0 text-dark">Detail {{$k->judul}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="callout callout-info">
            {!! $k->deskripsi !!}
            @endforeach
        </div>
    </div>
</div>


@stop