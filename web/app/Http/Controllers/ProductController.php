<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('adminnew.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        // $brand = \App\Models\Brand::all();
        return view('adminnew.product.add', compact('product', 'category', 'color', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'proimage' => 'required',
            'proimage.*' => 'required'
        ]);

        $category = null;

        if ($request->input('catid') != '0') {
            $category = $request->input('catid');
        }

        // dd($request->file('proimage')->getClientOriginalName());

        $product = Product::create([
            'catid' => $category,
            'proname' => $request->input('proimage'),
            'prodescription' => $request->input('prodescription'),
            'proimage' => $request->file('proimage')->getClientOriginalName(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($product && $request->hasfile('proimage')) {
            $names = [];

            foreach ($request->proimage as $key => $item) {
                $name = time() . rand(1, 100) . '.' . $item->extension();
                $item->move(public_path('images'), $name);
                $names[] = $name;
            }

            // Gán tên tất cả các tệp ảnh vào trường mo reimage của sản phẩm
            $product->moreimage = implode(',', $names);
            $product->save();
        }

        if ($product && $request->input('colorid')) {
            foreach ($request->colorid as $key => $color) {
                $productvariant = ProductVariant::create([
                    'ProID' => $product->ProID,
                    'SizeID' => $request->sizeid[$key],
                    'Quantity' => $request->quantity[$key],
                    'price' => $request->price[$key],
                    // 'price' => $request->input('price'),
                    'ColorID' => $color,
                    // 'Quatity' => $request->input('quantity'),
                ]);
            }
        }

        return redirect('admin/product');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::all();
        $color = Color::all();
        $category = Category::all();
        // $brand = \App\Models\Brand::all();
        $product = Product::find($id);
        return view('adminnew.product.edit', compact('product', 'category', 'size', 'color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $brand = null;
        $category = null;
        // $productVariant = ProductVariant::findOrFail($id);
        // $product = $productVariant->product;
        // if ($request->input('catid') != '0') {
        //     $category = $request->input('catid');
        // }
        // // $request->validate([
        // //     'proname' => 'string|max:255',
        // //     // 'prodescription' => 'required|string',
        // //     'category' => 'integer',
        // //     'variants.*.price' => 'numeric',
        // //     'variants.*.quantity' => 'integer',
        // //     'variants.*.size_id' => 'integer|exists:size,SizeID',
        // //     'variants.*.color_id' => 'integer|exists:color,ColorID'
        // // ]);
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


        $product = Product::find($id);
        $product->update([
            'CatID' => $category,
            'ProName' => $request->input('proname'),
            'Price' => $request->input('price'),
            'ProImage' => $request->file('proimage')->getClientOriginalName(),
            // 'discount' => $request->input('discount'),
            'prodescription' => $request->input('prodescription'),
            'status' => (bool)$request->input('status'),
            'updated_at' => now(),
        ]);
        $variantData = $request->input('variants');
        // dd($variantData);
        foreach ($variantData as $item) {
            if (isset($item['ProVarID'])) {
                // If ProVarID exists, update the existing variant
                $variant = ProductVariant::where('ProVarID', $item['ProVarID'])->update([
                    'ProID' => $id,
                    'Price' => $item['price'],
                    'Quantity' => $item['quantity'],
                    // 'sku' => $item['sku'], // Uncomment if needed
                    // 'status' => $item['status'], // Uncomment if needed
                    'SizeID' => $item['size_id'],
                    'ColorID' => $item['color_id'],
                    'updated_at' => now(),
                ]);
            } 
            // else {

            //     // If ProVarID does not exist, create a new variant
            //     $variant = ProductVariant::create([
            //         'ProID' => $id,
            //         'Price' => $item['price'],
            //         'Quantity' => $item['quantity'],
            //         // 'sku' => $item['sku'], // Uncomment if needed
            //         // 'status' => $item['status'], // Uncomment if needed
            //         'SizeID' => $item['size_id'],
            //         'ColorID' => $item['color_id'],
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);
            // }
        }
        if ($product && $request->input('colorid')) {
            foreach ($request->colorid as $key => $color) {
                $productvariant = ProductVariant::create([
                    'ProID' => $product->ProID,
                    'SizeID' => $request->sizeid[$key],
                    'Quantity' => $request->quantity[$key],
                    'price' => $request->price[$key],
                    'ColorID' => $color,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]);
            }
        }
 
        return redirect('admin/product');
    }

    // public function update(Request $request, $id)
    // {
    //     $brand = null;
    //     $category = null;

    //     // if($request->input('brandid') != '0'){
    //     //     $brand = $request->input('brandid');
    //     // }

    //     if($request->input('catid') != '0'){
    //         $category = $request->input('catid');
    //     }

    //     $product=Product::find($id)->update([
    //         'catid' => $category,
    //         // 'brandid' => $brand,
    //         'ProName' => $request->input('proname'),
    //         'proimage' => $request->file('proimage')->getClientOriginalName(),
    //         // 'price' => $request->input('price'),
    //         // 'discount' => $request->input('discount'),
    //         'prodescription' => $request->input('prodescription'),
    //         'status'=>(bool)$request->input('status'),
    //         'updated_at' => now(),
    //     ]);
    //     return redirect('admin/product');
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variant = ProductVariant::where('ProID', $id);
        if (isset($variant)) {
            $variant->delete();
        }
        $product = Product::find($id, 'ProID')->delete();
        return redirect('admin/product');
    }
}
