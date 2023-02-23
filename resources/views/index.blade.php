<x-app tittle = "Mercado Libre">
<!-- carrito -->
@if (count(Cart::content()))
    <div class="col-sm-3 ms-auto">
        <p class="text-center me-1">carrito</p>
        <thead>
            <td>Product</td>
        </thead>
        <table class="table table-striped">
            @foreach (Cart::content() as $item)
            <tr>
                <td>{{$item -> name}}</td>
                <td>{{$item -> qty}} x {{$item -> price}}</td>
                <td>{{number_format($item -> qty * $item -> price, 2)}}</td>
                <td><a href="/eliminaritem/{{$item->rowId}}" class="text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                </a></td>
            </tr>
            @endforeach
            <tr><td colspan="4"><p class="text-end m-0 p-0">Subtotal COP ${{Cart::subtotal()}}</p></td></tr>
            <tr><td colspan="4"><p class="text-end m-0 p-0">IVA 19% {{Cart::tax()}}</p></td></tr>
            <tr><td colspan="4"><p class="text-end m-0 p-0">Total COP ${{Cart::total()}}</p></td></tr>
            <tr><td colspan="4"><p class="text-end m-0 p-0">Subtotal COP ${{Cart::subtotal()}}</p></td></tr>
        </table>
        <p class="text-center"><a href="/showcart" class="btn btn-outline-success btn-sm">Ver Carrito</a></p>
    </div>
@endif

<!-- Carrusel -->
<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="/getDetail/46"><img src="" class="d-block w-100" alt="..."/></a>
        </div>
        <div class="carousel-item">
            <a href="/getDetail/46"><img src="" class="d-block w-100" alt="..."/></a>
        </div>
        <div class="carousel-item">
            <a href="/getDetail/46"><img src="" class="d-block w-100" alt="..."/></a>
        </div>
        <div class="carousel-item">
            <a href="/getDetail/46"><img src="" class="d-block w-100" alt="..."/></a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Un Producto -->
<section class="d-flex justify-content-center flex-wrap">
    @if (count($category -> product) > 0)
    <div class="mx-5 d-flex mt-4">
        <h2>{{$category -> name}}</h2>
        <a class="text-decoration-none mt-1 mb-2 mx-2" href="{{ route('categoriesview.index', ['category' => $category])}}" class="card-title text-uppercase">Ver Todos Los Productos</a>
    </div>
    <section class="d-flex justify-content-center flex-wrap text-center mt-4">
        <?php $count = 0;?>
        @foreach ($category ->product as $count => $product)}
        @break($count == 4)
        <div class="card mx-2 mb-5 shadow mt-3" style="width: 16rem;">
        @if ($product -> image)
        <img src="/storage/images/{{ $product->image }}" style="height:230px;">
        @else
        <img src="https://static.vecteezy.com/system/resources/thumbnails/003/399/468/small/modern-flat-design-of-jpg-file-icon-for-web-free-vector.jpg" alt="product-image">
        @endif
        <div class="card-body">
            <h4 class="card-text">{{ $product -> name}}</h4><br>
            <p>Precio: $ {{number_format($product -> price), 2}}</p><br>
            <div class="mt-2 d-flex justify-content-between">
                <form action="{{route('additem')}}" method="post">
                    @csrf
                    <a href="{{route('getDetail',['product' => $product->id ])}}" type="submit" class="btn btn-primary d-flex justify-content-between">Detalles</a>
                    @auth
                    <div class="auth">
                        <input type="hidden" name="precio_id" value="{{$product->price}}">
                        <input type="hidden" name="producto_id" value="{{$product->id}}">
                        <input type="submit" value="Agregar al carrito" class="btn btn-success w-100 d-flex justify-content-between mt-2">
                    </div>
                    @endauth
                </form>
            </div>
        </div>
        </div>
        @endforeach

    </section><br>
    @endif
    @endforeach
</section>
</x-app>
