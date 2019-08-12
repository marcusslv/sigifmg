@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Novo usuário</h3>
    <div class="box-tools pull-right">
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <form action="{{route('admin.user.store')}}" method="post">
    <div class="box-body">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="">
      @include('user.partials.form')
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    <a href="{{route('admin.user.index')}}" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</a>
      <button type="submit" class="btn btn-success pull-right btn-flat">Salvar</button>
    </div>
  </form>
  <!-- box-footer -->
</div>
<!-- /.box -->
@stop

@section('js')
<script>
  $(function(){
    $('.select2').select2();
  });
</script>

@endsection