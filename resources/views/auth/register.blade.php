<x-app>
    <section class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>Registro</h2>
            </div>
            <div class="card-body">
                <form action="{{route('user.create.post')}}" method="POST">
                    @csrf
                    <x-user.form-register/>
                </form>
            </div>
        </div>
    </section>
</x-app>
