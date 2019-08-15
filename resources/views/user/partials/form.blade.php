<br>
<div class="form-group @error('name') has-error @enderror" data-intro='Entre com o nome.'>
    <label for="name">@error('name')<i class="fa fa-times-circle-o"></i> @enderror Nome</label>
    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Entre com o nome">
    @error('name')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('email') has-error @enderror" data-intro='Entre com o E-mail'>
    <label for="email">@error('email')<i class="fa fa-times-circle-o"></i> @enderror Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Entre com o E-mail">
    @error('email')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('group') has-error @enderror" data-intro='Selecione...'>
    <label for="group[]" > @error('group')<i class="fa fa-times-circle-o"></i> @enderror  Grupo de usuários</label>
    <select class="form-control select2" name="group[]" multiple="multiple" data-placeholder="Selecione..."
                style="width: 100%;">
    @foreach ($roles as $role)
        <option value="{{$role->name}}" 
            @foreach ($user->roles->all() as $roleUser)
                @if ( $role->name == $roleUser->name)
                selected
                @endif
            @endforeach
        >{{$role->name}}</option>
    @endforeach foreach($users as $user){ $user->as
    </select>
    @error('group')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>

<div class="form-group @error('password') has-error @enderror">
    <label for="password">@error('password')<i class="fa fa-times-circle-o"></i> @enderror Senha</label>
    <input type="password" class="form-control" name="password" id="password" value="{{$user->password}}" placeholder="Entre com a senha">
    @error('password')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>

<div class="form-group @error('password_confirmation') has-error @enderror">
    <label for="password">@error('password_confirmation')<i class="fa fa-times-circle-o"></i> @enderror Confirmar senha</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme a senha">
    @error('password_confirmation')
        <span class="help-block">{{ $message }}</span>
    @enderror
</div>