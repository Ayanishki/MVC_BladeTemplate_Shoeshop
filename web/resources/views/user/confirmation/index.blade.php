@extends('user.layout')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Confirmation</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Confirmation</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li><a href="#"><span>Order number</span> : {{$order->OrdID}}</a></li>
                        <li><a href="#"><span>Date</span> : {{ $order->ReceivingAddress}}</a></li>
                        <li><a href="#"><span>Total</span> : USD {{$orderItems->sum(fn($orderItems)=>$orderItems->Quantity * $orderItems->Price)}}</a></li>
                        <li><a href="#"><span>Payment method</span> : Check payments</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Billing Address</h4>
                    <ul class="list">
                        <li><a href="#"><span>Street</span> : 56/8</a></li>
                        <li><a href="#"><span>City</span> :{{ $order->ReceivingAddress}} </a></li>
                        <li><a href="#"><span>Country</span> : {{ $order->ReceivingAddress}}</a></li>
                        <li><a href="#"><span>Postcode </span> : 36952</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Shipping Address</h4>
                    <ul class="list">
                        <li><a href="#"><span>Street</span> : 56/8</a></li>
                        <li><a href="#"><span>City</span> : {{ $order->ReceivingAddress}}</a></li>
                        <li><a href="#"><span>Country</span> : {{ $order->ReceivingAddress}}</a></li>
                        <li><a href="#"><span>Postcode </span> : 36952</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                        <tr>
                            <td>
                                <p>{{$item->product->ProName}}</p>
                            </td>
                            <td>
                                <h5>x {{$item->Quantity}}</h5>
                            </td>
                            <td>
                                <p>{{$item->Price}}</p>
                            </td>
                        </tr>
                        @endforeach
                        
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{$orderItems->sum(fn($orderItems)=>$orderItems->Quantity * $orderItems->Price)}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Flat rate: $50.00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>${{$orderItems->sum(fn($orderItems) => $orderItems->Quantity * $orderItems->Price)}}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection