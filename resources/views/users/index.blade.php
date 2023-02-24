<x-app>
    @livewireStyles
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <section class="container">}
        <div class="card my-5">
            <div class="card-header d-flex justify-content-between">
                <h2>Usuarios</h2>
                <a href="{{route('user.create')}}" class="btn btn-primary">Crear Usuario</a>
            </div>
            <div class="card-body">
                <table class="table my-4 mx-3" id="User">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users a $user)
                        <tr>
                            <td>{{$user -> id}}</td>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> last_name}}</td>
                            <td>{{$user -> email}}</td>
                            <td class="d-flex">
                                <a href="{{route('user.edit', ['user' => $user -> id])}}" class="btn btn-warning mx-2 btn-sm me-1">Editar</a>
                                <form action="{{route('user.delete', ['user' =>$user->id])}}" method="post">
                                    @csrf
                                    @method ('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <livewire:datatable model="App\Models\User" searchable="name">
            </div>
        </div>
    </section>
</x-app>
