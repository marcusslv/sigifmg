@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
<div class="box box-success ">
  <div class="box-header with-border">
      <h3 class="box-title ">Editar usuário</h3>
      <div class="box-tools pull-right">
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <form action="{{route('admin.user.update')}}" method="POST" id="edit-user">
      <div class="box-body">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="edit-id" value="{{$user->id}}">
        @include('user.partials.form')
      </div>
      <!-- /.box-body -->
      <div class="box-footer" >
        <a href="{{route('admin.user.index')}}" class="btn btn-default btn-flat" data-intro='Hello step one!'>Cancelar</a>
        <button type="submit" class="btn btn-success pull-right btn-flat" data-intro='Salvar as alterações' >Salvar</button>
      </div>

    </form>
    <!-- box-footer -->
  </div>
  <!-- /.box -->
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.min.css" integrity="sha256-/oZ7h/Jkj6AfibN/zTWrCoba0L+QhP9Tf/ZSgyZJCnY=" crossorigin="anonymous" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js" integrity="sha256-fOPHmaamqkHPv4QYGxkiSKm7O/3GAJ4554pQXYleoLo=" crossorigin="anonymous"></script>
<script>
  
  $(function(){

    introJs().start();

    $('.select2').select2();
  });
</script>

@endsection