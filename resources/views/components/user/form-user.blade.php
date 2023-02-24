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
        @enderror
    </div>
    @endrole
</form>
