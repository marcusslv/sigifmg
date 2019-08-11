<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Editar usuário</h4>
            </div>
          <form action="{{route('admin.user.update')}}" method="post" id="edit-user">
              {{ csrf_field() }}
                <div class="modal-body">
                    @include('user.partials.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success btn-flat">Salvar</button>
                </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->