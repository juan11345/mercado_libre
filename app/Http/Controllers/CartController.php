<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function additem(Request $request){
        $product = Product::find($request -> product_id);

        Cart::add([
            'id' => $product->id,
			'name' => $product->name,
			'price' => $product->price,
			'qty' => 1,
			'weight' =>1,
			'options' => [
			'image' => $product->image,
			'name' => null,
        ]
    ]);

        return redirect() -> back() -> with("sucess","$product -> name !se ha agregado al carrito");

    }

    public function showCart(){
        return view('Cart.cart');
    }

    public function incrementarCantidad(Request $request){
        $item = Cart::content() -> where("rowId", $request -> id)-> first();
        Cart::update($request -> id, ["qty" => $item -> qty+1]);
        return back() -> with("succes", "Agregaste un Producto mas");
    }

    public function decrementarCantidad(Request $request){
        $item = Cart::content() -> where("rowId", $request -> id) -> firts();
        Cart::update($request -> id, ["qty" => $item -> qty-1]);
        return back() -> with("succes", "Quitaste un Producto");
    }

    public function eliminarProducto(Request $request){
        Cart::remove($request -> id);
        return back() -> with("succes", "Productos Eliminados Correctamente");
    }

    public function eliminarCarrito(){
        Cart::destroy();
        return back() -> with("succes", "Carrito Eliminado CorrectamenteS");
    }


}
