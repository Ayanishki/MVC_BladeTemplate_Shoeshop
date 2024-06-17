<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                @if(count($product->images) > 1)
                <div class="s_Product_carousel">
                @else
                <div class="Product_carousel">
                @endif
                @foreach($product->images as $item)
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                    </div>
                @endforeach
                </div>
            </div>


            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>{{ number_format($product->discount) }} VNĐ</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Danh mục</span> : {{ $product->categories->name ?? '' }}</a></li>
                        <li><a href="#"><span>Thương hiệu</span> : {{ $product->brands->name ?? ''}}</a></li>
                    </ul>
                    <hr>
                    <div class="product_count" style="width: 100%;">
                        <h2>Kích cỡ</h2>
                        <select name="size">
                            <option>Choose an option</option>
                            @foreach(array_unique($product->productDetails->pluck('size')->toArray()) as $item)
                            @if($item != '')
                                <option>{{ $item }}</option>
                            @endif                            
                            @endforeach
                        </select>
                    </div>

                    <div class="product_count" style="width: 100%;">
                        <h2>Màu sắc</h2>
                        <select name="color">
                            <option>Choose an option</option>
                            @foreach(array_unique($product->productDetails->pluck('color')->toArray()) as $item)
                            @if($item != '')
                                <option>{{ $item }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                    </div>
                    <div class="card_area d-flex align-items-center">
                        <a class="primary-btn" href="#">Add to Cart</a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>