<form>
    @role('admin')
    <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select name="role" id="role" class="form-control">
            @foreach ($roles as $role)
            <option value="{{$role}}">{{$role}}</option>
            @endforeach
        </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    @endrole
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')? old('name'): (isset($user) ? $user->name: '')}}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Apellido</label>
        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')? old('last_name'): (isset($user) ? $user->last_name: '')}}">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')? old('email'): (isset($user) ? $user ->email:'')}}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control @error('passwor') is invalid @enderror">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Confirmar Contraseña</label>
        <input <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')? old('last_name'): (isset($user) ? $user->last_name: '')}}">
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <a href="/Users" class="btn btn-danger me-2">Cancelar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
