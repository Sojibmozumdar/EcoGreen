<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request)
    {

        if (! Auth::check()) {
            return redirect("user-login")->with('error', 'Please login first');
        }

        $cart = ShoppingCart::firstOrNew([
            'user_id'    => Auth::id(),
            'product_id' => $request->product,
        ]);

        $cart->quantity += $request->quantity;
        $cart->save();

        return back()->with('success', 'Cart added Successfully');

    }

    public function viewCarts()
    {
        if (! Auth::check()) {
            return redirect("user-login")->with('error', 'Please login first');
        }

        $cart_products = ShoppingCart::where('user_id', Auth::id())->get();

        return view('frontend.carts', compact('cart_products'));
    }

public function updateCartAjax(Request $request)
{
    $cart = ShoppingCart::find($request->id);

    if ($cart) {
        $cart->quantity = $request->quantity;
        $cart->save();
    }

    return response()->json([
        'success' => true
    ]);
}


public function deleteCartAjax(Request $request)
{
    $cart = ShoppingCart::find($request->id);

    if ($cart) {
        $cart->delete();
    }

    return response()->json([
        'success' => true
    ]);
}

}
