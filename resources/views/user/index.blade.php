@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop

@section('js')
    <script>
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
    </script>    
@endsection