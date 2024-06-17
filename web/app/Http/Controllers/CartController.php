<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $cart = Cart::where('UserID', $user->UserID)->where('Status', 'open')->first();
        $cart = Cart::where('UserID', $user->UserID)->first();

        if (!$cart) {
            return view('user.cart.index', ['cart' => null, 'cartDetails' => []]);
        }

        $cartDetails = $cart->details()->with('product')->get();

        return view('user.cart.index', compact('cart', 'cartDetails'));
    }

    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(
            // ['UserID' => $user->UserID, 'Status' => 'open'],
            ['UserID' => $user->UserID],
            ['created_at' => now(), 'updated_at' => now()]
        );
        $qty = $request->input('Quantity');

        $cartDetail = CartDetail::firstOrCreate(
            ['CartID' => $cart->CartID, 'ProID' => $productId],
            ['Quantity' => $qty, 'Price' => Product::find($productId)->Price, 'created_at' => now(), 'updated_at' => now()]
        );
        if (!$cartDetail->wasRecentlyCreated) {
            $cartDetail->Quantity += $qty;
            $cartDetail->save();
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function update(Request $request, $cartDetailId)
    {
        // dd($request->all());
        $cartDetail = CartDetail::find($cartDetailId);
        if ($cartDetail) {
            $cartDetail->updated_at = now();
            $cartDetail->Quantity = $request->input('Quantity');
            $cartDetail->save();
            return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
        }

        // return redirect()->route('cart.index')->with('success', 'Cart updated');
        return response()->json(['success' => false, 'message' => 'Cart detail not found'], 404);
    }
    public function updateAll(Request $request)
    {
        $quantities = $request->input('quantities');
        foreach ($quantities as $cartDetailId => $quantity) {
            $cartDetail = CartDetail::findOrFail($cartDetailId);
            $cartDetail->update(['Quantity' => $quantity]);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
    }

    public function remove($cartDetailId)
    {
        $cartDetail = CartDetail::findOrFail($cartDetailId);
        $cartDetail->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }
}
