@extends('adminnew.layout')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form class="form-sample" action="{{ route('size.update', $size->SizeID) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="card-description">
                            Product info
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SizeID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Auto generate" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SizeName</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sizename" class="form-control" value="{{$size->SizeName}}" placeholder="SizeName" >

                                    </div>
                                </div>
                            </div>
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
