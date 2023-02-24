<x-app>
    @if (count(Cart::content()))
    <div class="col-sm-3 ms-auto">
        <p class="text-center me-1">Carrito</p>
        <thead>
            <td>Producto</td>
        </thead>
        <table class="teble table-striped">
            @foreach (Cart::content() as $item)
            <tr>
                <td>{{$item -> name}}</td>
                <td>{{$item -> qty}} x {{$item -> price}}</td>
                <td>{{number_format($item -> qty * $item -> price,2)}}</td>
                <td><a href="/eliminaritem/{{$item -> rowId}}" class="text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                </a></td>
            </tr>
            @endforeach
            <tr><td colspan="4"><p class="text-end m-0 p-0">Suptotal COP ${{Cart::subtotal()}}</p></td></tr>
            <tr><td colspan="4"><p class="text-end m-0 p-0">Iva 19% {{Cart::tax()}}</p></td></tr>
            <tr><td colspan="4"><p class="text-end m-0 p-0">Total COP ${{Cart::total()}}</p></td></tr>
        </table>
        <p class="text-center"><a href="/showcart" class="btn btn-outline-success btn-sm">Ver carrito</a></p>
    </div>
    @endif
    <div class="my-3">
        <a  href="/" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="ms-2 bi bi-house" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
        </svg></a>
    </div>
    <section class="d-flex justify-content-center flex-wrap">
        <div class="card mx-3 my-3" style="width: 18rem;">
            <div>
                <div class="card-img-top">
                    @if ($product -> image)
                    <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="Product" width="100">
                    @else
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/003/399/468/small/modern-flat-design-of-jpg-file-icon-for-web-free-vector.jpg" class="card-img-top" alt="Product">
                    @endif
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{$product -> name}}</h3>
                    <h5 class="card-text">{{$product -> descryption}}</h5>
                    <p class="card-text">Categoria: {{$product -> category -> name}}</p>
                    <h6 class="card-title">Stock: {{$product -> stock}}</h6>
                    <h5 class="card-text">$ {{number_format($product -> price)}}</h5>
                    @auth
                    <div class="mt-2 d-flex justify-content-between">
                        <form action="{{route('additem')}}" method="post">
                            @csrf
                            <input type="hidden" name="precio_id" value="{{$product->price}}">
                            <input type="hidden" name="producto_id" value="{{$product->id}}">
                            <input type="submit" value="Agregar al carrito" class="btn btn-success w-100 d-flex justify-content-between">
                        </form>
                    </div>
                    @else
                    <div class="mt-2 d-flex justify-content-between">
                        <a href="{{ route('login') }}" class="btn btn-danger">Ingresa para Añadir al carrito</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</x-app>
