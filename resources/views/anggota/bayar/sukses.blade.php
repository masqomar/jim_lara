@extends('layouts.user')

@section('content')
<div class="order-success-wrapper">
    <div class="custom-container">
        <div class="order-done-content">
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
                <br>
                <h6>
                    <a class="btn btn-sm btn-warning text-center" href="{{route('home')}}" role="button">Kembali</a>
                </h6>
            </div>
            @endif
        </div>

        <br>
        <br>
        <br>


    </div>
</div>
@endsection