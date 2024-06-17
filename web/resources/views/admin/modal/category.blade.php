<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới danh mục </h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên danh mục mới</label>
              <input class="form-control" type="text" required>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Danh mục sản phẩm hiện đang có</label>
              <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                @foreach($category as $item)
                    <tr>
                      <td style="text-align: center">{{ $item->catname }}</td>
                      <td style="text-align: center">
                          <form action="{{ route('category.destroy', $item->catid) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-primary btn-sm trash" type="submit" title="Xóa"
                                  onclick="return confirm('Bạn có chắc chắn muốn thêm sản phẩm này không?')"><i class="fas fa-trash-alt"></i> 
                              </button>
                          </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
              </table>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>