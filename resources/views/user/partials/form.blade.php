
<div class="form-group @error('name') has-error @enderror">
    <label for="name">@error('name')<i class="fa fa-times-circle-o"></i> @enderror Nome</label>
<input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Entre com o nome">
    @error('name')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('email') has-error @enderror">
    <label for="email">@error('email')<i class="fa fa-times-circle-o"></i> @enderror Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Entre com o E-mail">
    @error('email')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label>Grupo de permissão</label>
    <select class="form-control select2" name="states[]" multiple="multiple" data-placeholder="Selecione..."
                style="width: 100%;">
            <option value="admin">Administrador</option>
            <option value="Diretoria">Diretoria</option>
            <option value="Coordenador">Coordenador de Curso</option>
    </select>
    @error('states[]')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>
