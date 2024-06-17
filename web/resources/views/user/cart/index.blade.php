@extends('user.layout')

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cartDetails && count($cartDetails) > 0)
                                @foreach ($cartDetails as $cartDetail)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img style="width:100px"
                                                        src="images/{{ $cartDetail->product->ProImage }}" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $cartDetail->product->ProName }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>${{ $cartDetail->Price }}</h5>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.update', $cartDetail->CartDetailID) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="product_count">
                                                    <input type="number" name="Quantity" id="sst{{ $cartDetail->ProID }}"
                                                        maxlength="12" title="Quantity:" value="{{ $cartDetail->Quantity }}"
                                                        min="1" class="input-text qty">
                                                    <button onclick="increaseQuantity({{ $cartDetail->ProID }})"
                                                        class="increase items-count" type="button"><i
                                                            class="lnr lnr-chevron-up"></i></button>
                                                    <button onclick="decreaseQuantity({{ $cartDetail->ProID }})"
                                                        class="reduced items-count" type="button"><i
                                                            class="lnr lnr-chevron-down"></i></button>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                <script>
                                                    function increaseQuantity(proId) {
                                                        var input = document.getElementById('sst' + proId);
                                                        var value = parseInt(input.value, 10);
                                                        if (!isNaN(value)) {
                                                            input.value = value + 1;
                                                        }
                                                    }

                                                    function decreaseQuantity(proId) {
                                                        var input = document.getElementById('sst' + proId);
                                                        var value = parseInt(input.value, 10);
                                                        if (!isNaN(value) && value > 1) {
                                                            input.value = value - 1;
                                                        }
                                                    }

                                                    function updateCart(cartDetailId) {
                                                        var input = document.querySelector(`#cart-detail-${cartDetailId} input[name='Quantity']`);
                                                        var quantity = input.value;

                                                        fetch(`{{ url('/cart/update') }}/${cartDetailId}`, {
                                                                method: 'PUT',
                                                                headers: {
                                                                    'Content-Type': 'application/json',
                                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                },
                                                                body: JSON.stringify({
                                                                    Quantity: quantity
                                                                })
                                                            })
                                                            .then(response => response.json())
                                                            // .then(data => {
                                                            //     if (data.success) {
                                                            //         document.getElementById(`subtotal-${cartDetailId}`).innerText = `$${data.subtotal}`;
                                                            //         document.getElementById('total').innerText = `$${data.total}`;
                                                            //     }
                                                            // })
                                                            .catch(error => console.error('Error:', error));
                                                    }
                                                </script>
                                            </form>
                                        </td>
                                        <td>
                                            <h5>${{ $cartDetail->Quantity * $cartDetail->Price }}</h5>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.remove', $cartDetail->CartDetailID) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>${{ $cartDetails->sum(fn($cartDetail) => $cartDetail->Quantity * $cartDetail->Price) }}
                                        </h5>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td colspan="3"></td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="">Continue Shopping</a>
                                            <a class="primary-btn" href="checkout">Proceed to checkout</a>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Your cart is empty</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
