@extends('adminnew.layout')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form class="form-sample" action="{{ route('product.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">
                            Product info
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ProID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Auto generate" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select name="catid" class="form-control">
                                            <option value="0">~ Chon Loai Sneaker ~</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->CatID }}">{{ $item->CatName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Metatitle</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ProName</label>
                                    <div class="col-sm-9">
                                        <input name="proname" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ProDescription</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="prodescription">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Size</label>
                                    <div class="col-sm-9">
                                        <input name="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ProImage</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="proimage">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Created at</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Now" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tags</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">MoreImage</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="images" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Created by</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Displayhome</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Yes" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Yes" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Inventory</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Yes" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sold</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="No" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Updated at</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Now" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Product detail
                        </p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                        <select name="colorid[]" class="form-control">
                                            <option value="0">-- Chọn --</option>
                                            @foreach ($color as $item)
                                                <option value="{{ $item->ColorID }}">{{ $item->ColorName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Size</label>
                                    <div class="col-sm-8">
                                        <select name="sizeid[]" class="form-control">
                                            <option value="0">-- Chọn --</option>
                                            @foreach ($size as $item)
                                                <option value="{{ $item->SizeID }}">{{ $item->SizeName }}</option>
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
                        <div class="row" id="add_product_detail">
                        </div>
                        <div class="row" style="justify-content: center">

                            <button type="button" class="btn btn-primary btn-icon-text" onclick="addProductDetail()"
                                role="button">
                                <i class="ti-file btn-icon-prepend"></i>
                                Add Product Variants
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
                                    <label class="col-sm-4 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                        <select name="colorid[]" class="form-control">
                                            @foreach ($color as $item)
                                                <option value="{{ $item->ColorID }}">{{ $item->ColorName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Size</label>
                                    <div class="col-sm-8">
                                        <select name="sizeid[]" class="form-control">
                                            @foreach ($size as $item)
                                                <option value="{{ $item->SizeID }}">{{ $item->SizeName }}</option>
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
                                        <input type="text" name="price" class="form-control" value="">
                                    </div>
                                </div>
                            </div>       
      `;

            // Lấy phần tử có id là "add_product_detail"
            var addProductDetailElement = document.getElementById("add_product_detail");

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
