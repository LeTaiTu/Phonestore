            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper right_col" id="right1">
              <div class="row">
                <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="main-content">
                    <?php echo $msg->display() ?>

                    <div class="col-md-3">
                      <a href="?sk=thanhvien&m=create" title="" class="btn btn-info" style="margin-bottom:20px; ">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm mới</a>
                        <a href="?sk=thanhvien" title="" class="btn btn-danger" style="margin-bottom:20px; ">Xem tất cả</a>
                      </div>
                      <div class="col-md-9">
                        <button type="button" class="btn btn-info pull-right" id="btnsearch" name="btnsearch">Search</button>
                        <input type="text" class="form-control pull-right" style="width: 300px;" name="txtsearch" id="txtsearch" value="<?php echo $keyword; ?>" placeholder="Tìm kiếm theo tên...">
                      </div>
                      <table class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr >
                            <th style="text-align: center">Họ tên</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Giới tính</th>
                            <th style="text-align: center">Ngày sinh</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center">Số điện thoại</th>
                            <th style="text-align: center">Thời gian tạo</th>
                            <th style="text-align: center">Sửa </th>
                            <th style="text-align: center">Xóa</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php if(!empty($dataAll)): ?>
                            <?php foreach($dataAll as $item):?>
                              <tr>
                                <td><?php echo $item['name'] ?></td>  
                                <td><?php echo $item['email'] ?></td> 
                                <td><?php if($item['sex']==0){echo "Nam";}?><?php if($item['sex']==1){echo "Nữ";}?></td>
                                <td><?php echo $item['birthday'] ?></td>
                                <td style="text-align: center"><?php echo $item['address'] ?></td>  
                                <td style="text-align: center"><?php echo $item['phone'] ?></td>  
                                <td style="text-align: center"><?php echo $item['create_time'] ?></td>  
                                <td style="text-align: center"><a href="home.php?sk=thanhvien&m=edit&id=<?php echo $item['id']?>" class="btn btn-warning">Sửa</a></td>  
                                <td style="text-align: center"><a onclick="deleteData(<?php echo $item['id']?>)" class="btn btn-danger">Xóa</a></td>  
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                      <div class="text-center">
                        <?php echo $paging['html']?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript" charset="utf-8">
                function deleteData(id) {
                  if (confirm("Bạn có muốn xóa?")) {
                    window.location.href = "?sk=thanhvien&m=delete&id="+id;
                  }
                  else{
                    window.location.href = "?sk=thanhvien";
                  }
                }
                $(document).ready(function() {
                  $("#btnsearch").click(function () {
                    keyword = $.trim($("#txtsearch").val());
                    window.location.href = "?sk=thanhvien&m=index&page=1&keyword="+keyword;
                  });
                });
              </script>