<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="row">
        <div class="col-lg-6">
            <div class="comment_list">
                @foreach($feedback as $item)
                <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="user/img/product/review-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>{{ $item->users->name }}</h4>
                            <h5>{{ $item->create_at }}</h5>
                            <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>{{ $item->comment }}</p>
                </div>
                @endforeach
                <!-- <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/product/review-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Blake Ruiz</h4>
                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                            <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo</p>
                </div>
                <div class="review_item reply">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/product/review-2.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Blake Ruiz</h4>
                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                            <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo</p>
                </div>
                <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/product/review-3.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Blake Ruiz</h4>
                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                            <a class="reply_btn" href="#">Reply</a>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo</p>
                </div> -->
            </div>
        </div>
        <div class="col-lg-6">
            <div class="review_box">
                <h4>Bình luận</h4>
                <form class="row contact_form" action="product/{{ $product->id }}" method="POST" id="contactForm" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="message" rows="1" placeholder="Viết bình luận"></textarea>
                        </div>
                    </div>
                    @if(auth()->check())
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn primary-btn">Gửi</button>
                    </div>
                    @else
                    <div class="col-md-12 text-right">
                        <a href="sign in" class="genric-btn primary-border circle arrow">Vui lòng đăng nhập<span class="lnr lnr-arrow-right"></span></a>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>