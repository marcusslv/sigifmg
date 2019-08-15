@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
<div class="introduction-farm">
<div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Lista de Usuários</h3>
          <div class="pull-right">
          <a href="{{route('admin.user.create')}}"  data-hint='Hello step one!' id="new-feture" class="btn btn-success btn-flat">
             Adicionar novo usuário
          </a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="users" data-intro="Tabela" class="display table table-hover table-bordered table-stripd" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>email</th>
                    <th>Grupo</th>
                    <th>Situação</th>
                    <th data-intro="Ações do sistamas">Ações</th>
                </tr>
            </thead>

        </table>
          
        </div>
      </div>
    </div>
</div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.min.css" integrity="sha256-/oZ7h/Jkj6AfibN/zTWrCoba0L+QhP9Tf/ZSgyZJCnY=" crossorigin="anonymous" />
  {{-- DataTable css --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css"/>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js" integrity="sha256-fOPHmaamqkHPv4QYGxkiSKm7O/3GAJ4554pQXYleoLo=" crossorigin="anonymous"></script>

   {{-- DataTable - js --}}
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>


{{-- My Script --}}
<script type='text/javascript'>

var dataTable;

$(function() {
      var status;
      var cont=0
      dataTable  = $('#users').DataTable( {
      "processing" : true,
      "serverSide" : true,
      ajax         : '{{ route('admin.user.getData') }}',
      'info'       : false,
      "columns"    : [
          { data: "id",           name: "id"},
          { data: "name",         name: "name"},
          { data: "email",        name: "email",  orderable: false },
          { data: "group",        name: "group",  orderable: false, 
          render:function (data) {                     
            var label = '';
            data.forEach(function (item) {
              label+='<span class="label label-primary">'+item+'</span> &nbsp;';
            });
            return label;
          }
          },
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
            btn = '<a href="'+dados.edit+'" data-hint="Ir para página de edção do usuário!" class="btn btn-warning btn-flat edit-user"><i class = "fa fa-edit"></i></a> ';
            if (dados.status) {
                return btn + '<button type="button" data-hint="Desativar usuário" data-route="'+dados.delete+'" class = " btn btn-danger delete-user btn-flat"><i class="fa fa-user-times"></button>';
            } else {
              return btn + '<button type="button" data-route = "'+dados.delete+'" class=" btn btn-success delete-user btn-flat"><i class="fa fa-user-plus"></button>';
            }
          }}],
      /*dom: 'lBfrtip',
      buttons: [{ 
        extend: 'excel',
        text: function (dt, button, config) {
          $(button).attr('data-intro', 'Exportar arquivo em excel.');
          return dt.i18n('buttons.excel', 'Excel');
        },
        attr:{
          title: "Excel",
        }
      }],*/
      "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
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
    // introJs().addHints();
    // introJs().setOption("hintButtonLabel", "OK");
    // introJs().setOptions([
    //   hints: [
    //     { hint: 'First hint', element: '#new-feature' },
    //     { hint: 'Second hint', element: '#new-button', hintAnimation: false }
    //   ]
    // ]);
  introJs(".introduction-farm").start();
  
});

function getDataUser(route) {
  var dt = {};
  // dt =  $('#users').DataTable( {
  //     "ajax": route,
  //     page: 'all'
  // } );

  // return dt;

 $.ajax({
   url:route,
   type: "GET",
   dataType: 'JSON',
   async: false,
   success: function (response) {
     debugger
     dt = response;
   }
 });

return dt;
 
  
  
}

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