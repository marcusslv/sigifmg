@extends('adminlte::page')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Lista de Usuários</h3>
          <div class="pull-right">
          <a href="{{route('admin.user.create')}}" class="btn btn-success btn-flat">
             Adicionar novo usuário
          </a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="users" class="display table table-hover table-bordered table-stripd" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>email</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>

        </table>
          
        </div>
      </div>
    </div>
</div>

@stop


@section('js')

<script type='text/javascript'>
var dataTable;

$(function() {
      var status;

      dataTable  = $('#users').DataTable( {
      "processing" : true,
      "serverSide" : true,
      ajax         : '{{ route('admin.user.getData') }}',
      'info'       : false,
      "columns"    : [
          { data: "id",           name: "id"},
          { data: "name",         name: "name"},
          { data: "email",        name: "email",  orderable: false },
          { data: "status",       name: "status",  orderable: false,
          render:function (data) {
            if (data) {
              return '<span class="label label-success">Ativado</span>';
            }
            return '<span class="label label-danger">Desativado</span>';
          }
          },
          { data: "action",       name: "action", orderable: false, 
          render: function (dados) {      
            btn = '<a href="'+dados.edit+'" class="btn btn-warning btn-flat edit-user"><i class = "fa fa-edit"></i></a> ';
            if (dados.status) {
                return btn + '<button type = "button" data-route = "'+dados.delete+'" class = " btn btn-danger delete-user btn-flat"><i class="fa fa-user-times"></button>';
            } else {
              return btn + '<button type="button" data-route = "'+dados.delete+'" class=" btn btn-success delete-user btn-flat"><i class="fa fa-user-plus"></button>';
            }
          }}],
          "rowCallback": function(row, data) {
            if (!data.status) {
              $(row).addClass('danger');
            }
        }
    });

    $(document).on('click', '.delete-user', function (event) {
      event.preventDefault();
      var route = $(this).attr('data-route');
      Swal.fire({
        title             : 'Você tem certeza?',
        text              : "Você esta alterando o status do usuário!",
        type              : 'warning',
        showCancelButton  : true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor : '#d33',
        confirmButtonText: 'Sim, Alterar!'
      }).then((result)   => {
        if (result.value) {
          destroy_user(route)
        }
      });
    });

    /*$(document).on('click', '.edit-user', function (event) {
      event.preventDefault();
      var route = $(this).attr('data-route');
      getDataUser(route);
    });*/

});

/*function getDataUser(route) {
  $.ajax({
    type: "GET",
    url : route,
    dataType: 'json',
    beforeSend: function(){
      // Swal.showLoading()
    },
    success: function(response){
      $("form#edit-user input#edit-id").val(response.id);
      $("form#edit-user input#name").val(response.name);
      $("form#edit-user input#email").val(response.email);
    }
  });  
}*/

function destroy_user(route) {
  $.ajax({
    type: "GET",
    url : route,
    beforeSend: function(){
      Swal.showLoading()
    },
    success: function(response){
      if(response['status']){
        Swal.fire({
          type             : 'success',
          title            : 'Usuário alterdo com sucesso!',
          showConfirmButton: false,
          timer            : 2000
        });
        dataTable.draw();
      }
    }
  });
}
</script>    
@endsection