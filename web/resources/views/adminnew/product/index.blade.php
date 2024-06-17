@extends('adminnew.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Product Manager</p>
                    <a type="button" class="btn btn-success btn-sm" href="product/create">Thêm</a>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example" class="display expandable-table dataTable no-footer"
                                                style="width: 100%;" role="grid">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>Quote#</th> --}}
                                                        <th>ProID</th>
                                                        <th>ProName</th>
                                                        <th>Image</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product as $item)
                                                        <tr>
                                                            <td>{{ $item->ProID }}</td>
                                                            <td>{{ $item->ProName }}</td>
                                                            {{-- <td>{{ $item->ProID }}</td> --}}
                                                            <td><img src="../images/{{ $item->ProImage }}" alt="" style="width:100px;"></td>
                                                            <td>{{ $item->Price ? $item->Price . ' đ' : 'N/A' }}</td>
                                                            <td>
                                                                @if ($item->Status == 1)
                                                                    Còn hàng
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-inverse-info btn-icon edit"
                                                                    onclick="window.location.href='{{ url('admin/product/' . $item->ProID . '/edit') }}'">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </button>
                                                                <form action="product/{{$item->ProID}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"
                                                                        type="submit" class="btn btn-inverse-dark btn-icon">
                                                                        <i class="ti-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5"></div>
                                        <div class="col-sm-12 col-md-7"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
