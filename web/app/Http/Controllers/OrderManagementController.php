<?php


namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
    public function index()
    {
        $order = Order::all();
        // dd($order);
        return view('adminnew.order.index', compact('order'));
    }
    public function create()
    {
        $product = Product::all();
        $order = Order::all();
        $orderdetail = OrderDetail::all();
        $user = User::all();
        return view('adminnew.order.add', compact('product', 'order', 'orderdetail', 'user'));
    }
    public function store(Request $request)
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
            'UserID' => $request->userid,
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
        if ($order && $request->input('proid')) {
            foreach ($request->proid as $key => $product) {
                OrderDetail::create([
                    'OrdID' => $order->OrdID,
                    'ProID' => $request->proid[$key],
                    'Quantity' => $request->quantity[$key],
                    'Price' => $request->price[$key],
                    'created_at' => now(),
                    "updated_at" => now()
                ]);
            }
        }

        return redirect('admin/order');
    }


    public function edit($id)
    {
        $product = Product::all();
        $order = Order::find($id);
        $orderdetail = OrderDetail::all();
        $user = User::all();
        return view('adminnew.order.edit', compact('product', 'order', 'orderdetail', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        // Validate the input data

        // $request->validate([
        //     'orderdetail.*.OrdtID' => 'nullable|integer|exists:order_details,OrdtID',
        //     'orderdetail.*.price' => 'required|numeric',
        //     'orderdetail.*.quantity' => 'required|integer',
        //     'orderdetail.*.pro_id' => 'required|integer|exists:products,id',
        // ]);


        // $orderDetail = OrderDetail::where('OrdID',$id)->get();
        // $product = $orderDetail->product;
        // dd($product);

        if ($request->input('userid') != '0') {
            $user = $request->input('userid');
        }
        // dd($request->input('variants'));

        // if ($product && $request->hasfile('images')) {
        //     $names = [];

        //     foreach ($request->images as $key => $item) {
        //         $name = time() . rand(1, 100) . '.' . $item->extension();
        //         $item->move(public_path('images'), $name);
        //         $names[] = $name;
        //     }

        //     // Gán tên tất cả các tệp ảnh vào trường mo reimage của sản phẩm
        //     $product->moreimage = implode(',', $names);
        //     $product->save();
        // }
        $order = Order::find($id);
        $order->update([
            'UserID' => $request->userid,
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
        $detailData = $request->input('orderdetail');
        foreach ($detailData as $item) {
            if (isset($item['OrdtID'])) {
                OrderDetail::where('OrdtID', $item['OrdtID'])->update([
                    'OrdID' => $id,
                    'Price' => $item['price'],
                    'Quantity' => $item['quantity'],
                    'ProID' => $item['pro_id'],
                    'updated_at' => now(),
                ]);
            }
        }
        if ($order && $request->input('proid')) {
            foreach ($request->proid as $key => $product) {
                OrderDetail::create([
                    'OrdID' => $order->OrdID,
                    'ProID' => $request->proid[$key],
                    'Quantity' => $request->quantity[$key],
                    'Price' => $request->price[$key],
                    "updated_at" => now()
                ]);
            }
        }
        return redirect('admin/order');
    }
    public function destroy($id)
    {
        $orderdetail = OrderDetail::where('OrdID', $id);
        if (isset($orderdetail)) {
            $orderdetail->delete();
        }
        $order = Order::find($id, 'OrdID')->delete();
        return redirect('admin/order');
    }
}
