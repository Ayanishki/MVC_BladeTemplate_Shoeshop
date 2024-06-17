<?php


namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        
        // Lấy id người dùng hiện tại
        $userId = Auth::id();

        // Nạp các mặt hàng trong giỏ hàng của người dùng hiện tại, bao gồm chi tiết của từng mặt hàng và sản phẩm liên quan
        $cartItems = CartDetail::with(['product'])
            ->leftJoin('cart', 'cartdetail.CartID', '=', 'cart.CartID')
            ->where('cart.UserID', $userId)
            ->get();


        // Trả về view checkout với dữ liệu đã nạp
        return view('user.checkout.index', compact('cartItems'));

    }
    public function processOrder(Request $request)
    {
        // $request->validate([
        //     'UserID' => 'required',
        //     'ReceivingName' => 'required|string|max:255',
        //     'ReceivingAddress' => 'required|string|max:255',
        //     'ReceivingPhone' => 'required|string|max:15',
        //     'ReceivingEmail' => 'required|email|max:255',
        //     'MoneyTotal' => 'required|numeric',
        //     'Payment' => 'required|string',
        // ]);
        $order = Order::create([
            'UserID' => Auth::id(),
            'ReceivingName' => $request->ReceivingName,
            'OrderDate' => now(),
            'Status' => 'Pending',
            'ReceivingAddress' => $request->ReceivingAddress,
            'ReceivingPhone' => $request->ReceivingPhone,
            'MoneyTotal' => $request->MoneyTotal,
            'Note' => $request->Note,
            'ReceivingEmail' => $request->ReceivingEmail,
            'Payment' => $request->Payment,
            'Discount' => $request->Discount ?? 0,
        ]);

         $userId = Auth::id();
        // Assuming cart items are being stored in session or another way
        $cartItems = CartDetail::with(['product'])
        ->leftJoin('cart', 'cartdetail.CartID', '=', 'cart.CartID')
        ->where('cart.UserID', $userId)
        ->get();
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'OrdID' => $order->OrdID,
                'ProID' => $item['ProID'],
                'Quantity' => $item['Quantity'],
                'Price' => $item['Price'],
                'created_at' => now(),
                "updated_at" => now()
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('order.success');
    }

    public function orderSuccess()
    {
        $userId = Auth::id();
        $order = Order::where('UserID', $userId)->orderBy('OrdID', 'desc')->first();
        $orderItems = OrderDetail::with(['product'])
                             ->where('OrdID', $order->OrdID)
                             ->get();
        // dd($orderItems);
        return view('user.confirmation.index',compact('orderItems','order'));
    }

}