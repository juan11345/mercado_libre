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
                <td></td>
            </tr>
        </table>
    </div>
</x-app>
