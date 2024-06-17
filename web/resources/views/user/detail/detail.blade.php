<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                {{-- @if (count($product->images) > 1)
                <div class="s_Product_carousel">
                @else
                <div class="Product_carousel">
                @endif
                @foreach ($product->images as $item)
                
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                    </div>
                @endforeach
                </div> --}}
                <div class="Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ asset('images/' . $product->ProImage) }}" alt="">
                    </div>
                </div>
            </div>


            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->ProName }}</h3>
                    <h2>{{ number_format($product->Price) }} VNĐ</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Danh mục</span> :
                                {{ $product->categories->CatName ?? '' }}</a></li>
                        <li><a href="#"><span>Thương hiệu</span> : {{ $product->brands->name ?? '' }}</a></li>
                    </ul>
                    <hr>
                    <div class="product_count" style="width: 100%;">
                        <h2>Kích cỡ</h2>
                        <select name="size">
                            <option>Choose an option</option>
                            {{-- @foreach (array_unique($product->variants->pluck('SizeID')->toArray()) as $item)
                                @if ($item != '')
                                    <option>{{ $item }}</option>
                                @endif
                            @endforeach --}}
                            @if ($product->variants->isNotEmpty())
                                @foreach ($product->variants->pluck('size.SizeName')->unique() as $item)
                                    @if ($item != '')
                                        <option>{{ $item }}</option>
                                    @endif
                                @endforeach
                            @else
                                <p>No variants available.</p>
                            @endif

                        </select>
                    </div>

                    <div class="product_count" style="width: 100%;">
                        <h2>Màu sắc</h2>
                        <select name="color">
                            <option>Choose an option</option>
                            @if ($product->variants->isNotEmpty())
                                @foreach ($product->variants->pluck('color.ColorName')->unique() as $item)
                                    @if ($item != '')
                                        <option>{{ $item }}</option>
                                    @endif
                                @endforeach
                            @else
                                <p>No variants available.</p>
                            @endif
                        </select>
                    </div>
                    <form action="{{ route('cart.add',$product->ProID) }}">
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="number" name="Quantity" id="sst" maxlength="12" title="Quantity:"
                                value="1" min="1" class="input-text qty">
                            <button onclick="increaseQuantity()" class="increase items-count" type="button"><i
                                    class="lnr lnr-chevron-up"></i></button>
                            <button onclick="decreaseQuantity()" class="reduced items-count" type="button"><i
                                    class="lnr lnr-chevron-down"></i></button>
                            <script>
                                function increaseQuantity() {
                                    var input = document.getElementById('sst');
                                    var value = parseInt(input.value, 10);
                                    if (!isNaN(value)) {
                                        input.value = value + 1;
                                    }
                                }

                                function decreaseQuantity() {
                                    var input = document.getElementById('sst');
                                    var value = parseInt(input.value, 10);
                                    if (!isNaN(value) && value > 1) {
                                        input.value = value - 1;
                                    }
                                }
                            </script>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <button class="primary-btn" type="submit">Add to Cart</button>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
