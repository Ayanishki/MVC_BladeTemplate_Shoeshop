@extends('adminnew.layout')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Size Manager</p>
                    <a type="button" class="btn btn-success btn-sm" href="size/create">Thêm</a>

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
                                                        <th>SizeID</th>
                                                        <th>SizeName</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($size as $item)
                                                        <tr>
                                                            <td>{{ $item->SizeID }}</td>
                                                            <td>{{ $item->SizeName }}</td>    
                                                            <td style="text-align: right">
                                                                <button type="button" class="btn btn-inverse-info btn-icon edit"
                                                                    onclick="window.location.href='{{ url('admin/size/' . $item->SizeID . '/edit') }}'">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </button>
                                                                <form action="size/{{$item->SizeID}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
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
