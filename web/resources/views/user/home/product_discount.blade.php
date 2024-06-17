<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Deals of the Week</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    @foreach ($product as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="product/{{ $item->ProID }}"><img style="width:70px; height:70px"
                                        src="images/{{ $item->ProImage }}" alt=""></a>
                                <div class="desc">
                                    <a href="product/{{ $item->ProID }}"
                                        class="title">{{ $item->ProName ? $item->ProName : 'N/A' }}</a>
                                    <div class="price">
                                        {{-- <h6>{{ number_format($item->variants->Price) }} VNĐ</h6>
                                <h6 class="l-through">{{ number_format($item->Price) }} VNĐ</h6> --}}
                                        {{-- @foreach ($item->variants as $variant)
                                            <div class="price">
                                                <h6>{{ number_format($variant->Price) }} VNĐ</h6>
                                                <!-- Assuming there is a regular price property -->
                                                <h6 class="l-through">{{ number_format($variant->Price) }} VNĐ</h6>
                                            </div>
                                        @endforeach --}}
                                        @if ($item->variants->isNotEmpty())
                                            <?php $variant = $item->variants->first(); ?>
                                            <div class="price">
                                                <h6>{{ number_format($variant->Price) }} VNĐ</h6>
                                                <!-- Assuming there is a regular price property -->
                                                <h6 class="l-through">{{ number_format($variant->Price) }} VNĐ</h6>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- @if ($item->variants->isEmpty())
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="product/{{ $item->ProID }}"><img style="width:70px; height:70px" src="images/{{ $item->ProImage }}" alt=""></a>
                            <div class="desc">
                                <a href="product/{{ $item->ProID }}" class="title">{{ $item->ProName ? $item->ProName : 'N/A' }}</a>
                                <div class="price">
                                    <h6>{{ number_format($item->price) }} VNĐ</h6>
                                    <h6 class="l-through">{{ number_format($item->price) }} VNĐ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @foreach ($item->variants as $variant)               
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="product/{{ $item->ProID }}"><img style="width:70px; height:70px" src="images/{{ $item->ProImage }}" alt=""></a>
                                <div class="desc">
                                    <a href="product/{{ $item->ProID }}" class="title"> {{ $item->ProName ? $item->ProName : 'N/A' }}</a>
                                    <div class="price">
                                        <h6>{{ number_format($variant->price) }} VNĐ</h6>
                                        <h6 class="l-through">{{ number_format($variant->price) }} VNĐ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                    @endforeach
                </div>
            </div>

            <!-- <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="user/img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div> -->

        </div>
    </div>
</section>
