<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{



    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());

        $totalOrders = Order::whereDate('created_at', $date)->count();
        $pendingOrders = Order::where('Status', 'pending')->whereDate('created_at', $date)->count();
        $cancelledOrders = Order::where('Status', 'pending')->whereDate('created_at', $date)->count();
        $completedOrders = Order::where('Status', '0')->whereDate('created_at', $date)->count();

        // Get data for the last 7 days
        $dates = [];
        $ordersData = [];
        $revenueData = [];
        for ($i = 6; $i >= 0; $i--) {
            $currentDate = Carbon::today()->subDays($i)->toDateString();
            $dates[] = $currentDate;
            $ordersData[] = Order::whereDate('created_at', $currentDate)->count();
            $revenueData[] = Order::whereDate('created_at', $currentDate)->sum('MoneyTotal');
        }
        $bestSellingProducts = \App\Models\Product::select('product.ProID', 'product.ProName', 'product.ProImage', 'product.Price', DB::raw('SUM(orderdetail.Quantity) AS total_sold'))
        ->leftJoin('orderdetail', 'product.ProID', '=', 'orderdetail.ProID')
        ->leftJoin('order', 'orderdetail.OrdID', '=', 'order.OrdID')
        ->groupBy('product.ProID', 'product.ProName', 'product.ProImage', 'product.Price')
        ->orderByDesc('total_sold')
        ->take(5)
        ->get();
        $bestSellingCategories = \App\Models\Category::select('category.CatID', 'category.CatName', 'category.CatImage', DB::raw('SUM(orderdetail.Quantity) AS total_sold'))
        ->leftJoin('product', 'category.CatID', '=', 'product.CatID')
        ->leftJoin('orderdetail', 'product.ProID', '=', 'orderdetail.ProID')
        ->leftJoin('order', 'orderdetail.OrdID', '=', 'order.OrdID')
        ->groupBy('category.CatID', 'category.CatName', 'category.CatImage',)
        ->orderByDesc('total_sold')
        ->take(5)
        ->get();
        return view('adminnew.statistical.index', compact('totalOrders', 'pendingOrders', 'cancelledOrders', 'completedOrders', 'date', 'dates', 'ordersData','revenueData','bestSellingProducts','bestSellingCategories'));
    }
}


