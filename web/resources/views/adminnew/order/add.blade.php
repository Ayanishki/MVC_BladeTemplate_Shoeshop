@extends('adminnew.layout')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form class="form-sample" action="{{ route('order.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">
                            Product info
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">OrderID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Auto generate" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">User</label>
                                    <div class="col-sm-9">
                                        <select name="userid" class="form-control">
                                            <option value="0">~ Chon Người dùng ~</option>
                                            @foreach ($user as $item)
                                                <option value="{{ $item->UserID }}">{{ $item->UserEmail }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ReceivingName</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ReceivingName">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ReceivingAddress</label>
                                    <div class="col-sm-9">
                                        <input name="ReceivingAddress" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ReceivingPhone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ReceivingPhone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ReceivingEmail</label>
                                    <div class="col-sm-9">
                                        <input name="ReceivingEmail" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Payment</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Payment">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Discount at</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Discount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Note</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Note">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <p class="card-description">
                            Order detail
                        </p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product</label>
                                    <div class="col-sm-8">
                                        <select name="proid[]" class="form-control">
                                            <option value="0">-- Chọn --</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->ProID }}">{{ $item->ProName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="quantity[]" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="price[]" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="add_order_detail">
                        </div>
                        <div class="row" style="justify-content: center">

                            <button type="button" class="btn btn-primary btn-icon-text" onclick="addProductDetail()"
                                role="button">
                                <i class="ti-file btn-icon-prepend"></i>
                                Add Order Variants
                            </button>

                        </div>
                        <button type="submit" class="btn btn-success btn-md btn-save">Save</button>
                        <button type="button" class="btn btn-danger btn-md" onclick="">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function addProductDetail() {
            // Tạo một phần tử div mới
            var newDiv = document.createElement("div");
            newDiv.classList.add("row");
            newDiv.style.display = "flex";
            newDiv.style.padding = "0";
            newDiv.style.marginTop = "15px";

            // Thêm nội dung HTML vào trong phần tử div mới
            newDiv.innerHTML = `

            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product</label>
                                    <div class="col-sm-8">
                                        <select name="proid[]" class="form-control">
                                            <option value="0">-- Chọn --</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->ProID }}">{{ $item->ProName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="quantity[]" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="price[]" class="form-control" value="">
                                    </div>
                                </div>
                            </div>   
      `;

            // Lấy phần tử có id là "add_product_detail"
            var addProductDetailElement = document.getElementById("add_order_detail");

            // Thêm phần tử div mới vào sau phần tử có id là "add_product_detail"
            addProductDetailElement.insertAdjacentElement('beforebegin', newDiv);
        }

        function deleteProductDetail(element) {
            // Xác định div cha của liên kết được nhấp vào
            var parentRowDiv = element.closest('.row');

            // Xóa div cha đó
            parentRowDiv.parentNode.removeChild(parentRowDiv);
        }
    </script>
@endsection
