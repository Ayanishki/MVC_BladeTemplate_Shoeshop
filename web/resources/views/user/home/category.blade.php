<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @foreach($category as $item)
                    <div class="col-lg-3 col-md-3">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="images/{{ $item->CatImage }}" alt="">
                            <a href="images/{{ $item->CatImage }}" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">{{ $item->CatName }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>