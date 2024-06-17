<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $product = \App\Models\Product::all();
        $latestProduct = \App\Models\Product::latest()->take(8)->get();
        $slide = \App\Models\Slide::all();
        $brand = \App\Models\Brand::all();
        $category = \App\Models\Category::limit(8)->get();

        $mostLovedProducts = \App\Models\Product::select('product.ProID', 'product.ProName', 'product.ProImage', 'product.Price', DB::raw('SUM(orderdetail.Quantity) AS total_sold'))
            ->leftJoin('orderdetail', 'product.ProID', '=', 'orderdetail.ProID')
            ->leftJoin('order', 'orderdetail.OrdID', '=', 'order.OrdID')
            ->where('order.created_at', '>=', now()->subMonths(3))
            ->groupBy('product.ProID', 'product.ProName', 'product.ProImage', 'product.Price')
            ->orderByDesc('total_sold')
            ->take(8)
            ->get();
        $bestSellingProducts = \App\Models\Product::select('product.ProID', 'product.ProName', 'product.ProImage', 'product.Price', DB::raw('SUM(orderdetail.Quantity) AS total_sold'))
            ->leftJoin('orderdetail', 'product.ProID', '=', 'orderdetail.ProID')
            ->leftJoin('order', 'orderdetail.OrdID', '=', 'order.OrdID')
            ->groupBy('product.ProID', 'product.ProName', 'product.ProImage', 'product.Price')
            ->orderByDesc('total_sold')
            ->take(8)
            ->get();
        return view('user.home.index', compact('bestSellingProducts', 'mostLovedProducts', 'latestProduct', 'product', 'slide', 'category', 'brand'));
    }
}
