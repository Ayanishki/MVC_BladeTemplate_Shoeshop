<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id){
        // $product = \App\Models\Product::find($id);
        $product = Product::with('variants.size', 'variants.color')->findOrFail($id);
        $relatedProduct = \App\Models\Product::where('CatID','=',$product->CatID)->get();
        $feedback = \App\Models\FeedBack::where('ProID','=',$id)->get();
        return view('user.detail.index', compact('feedback','relatedProduct','product'));
    }

    // public function comment(Request $request, $id){
    //     $comment = \App\Models\Comment::create([
    //         'proid' => $id,
    //         'userid' => auth()->id(),
    //         'comment' => $request->input('comment'),
    //         'status' => 1,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);
    //     return redirect('product/' . $id);
    // }
}
