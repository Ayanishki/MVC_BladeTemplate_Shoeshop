<div class="modal fade" id="addcolor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
        <div class="row">
          <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới màu sắc</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Danh mục màu sắc hiện đang có</label>
              <div style="height: 200px; overflow: auto;">
                <table class="table table-hover table-bordered" id="sampleTable">
                <tbody>
                  @foreach($color as $item)
                      <tr>
                        <td style="text-align: center">{{ $item->colorname }}</td>
                        <td style="text-align: center">
                            <form action="{{ route('color.destroy', $item->colorid) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary btn-sm trash" type="submit" title="Xóa"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa màu sắc này không?')"><i class="fas fa-trash-alt"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
        </div>
        <form action="{{route('color.store')}}" method="POST"
            enctype="multipart/form-data">
                @csrf
          <div class="row">
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên kích cỡ mới</label>
              <input class="form-control" type="text" required name="colorname">
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="submit">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          </form>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>