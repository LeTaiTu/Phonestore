            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper right_col" id="right1">
              <div class="row">
                <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="main-content">
                    <?php echo $msg->display() ?>

                    <div class="col-md-3">
                      <a href="?sk=sp&m=create" title="" class="btn btn-info" style="margin-bottom:20px; ">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm mới</a>
                        <a href="?sk=sp" title="" class="btn btn-danger" style="margin-bottom:20px; ">Xem tất cả</a>
                      </div>
                      <div class="col-md-9">
                        <button type="button" class="btn btn-info pull-right" id="btnsearch" name="btnsearch">Search</button>
                        <input type="text" class="form-control pull-right" style="width: 300px;" name="txtsearch" id="txtsearch" value="<?php echo $keyword; ?>" placeholder="Tìm kiếm theo tên...">
                      </div>
                      <table class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr >
                            <th style="text-align: center; width: 50px;">Sản phẩm</th>
                            <th style="text-align: center">Hãng</th>
                            <th style="text-align: center">Loại</th>
                            <th style="text-align: center">Hình ảnh</th>
                            <th style="text-align: center">Giá</th>
                            <th style="text-align: center; width: 350px;">Chi tiết</th>
                            <th style="text-align: center">Lượt xem</th>
                            <th style="text-align: center">Thời gian tạo</th>
                            <th style="text-align: center">Sửa </th>
                            <th style="text-align: center">Xóa</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php if(!empty($dataAll)): ?>
                            <?php foreach($dataAll as $item):?>
                              <tr>
                                <td style="text-align: center; width: 50px;"><?php echo $item['name_pro'] ?></td>  
                                <td style="text-align: center"><?php echo $item['name']?></td> 
                                <td style="text-align: center"><?php echo $item['nametype']?></td> 
                                <td style="text-align: center"><img style="height:100px;" src="<?php echo PATH_UPLOAD_PRODUCT . "/" .$item['image']; ?>" alt="<?php $item['image']; ?>"></td> 
                                <td style="text-align: center"><?php echo $item['price']?></td>   
                                <!-- <td></td>   -->
                                <td ><textarea style="width: 350px;" rows="5" readonly=""><?php echo $item['content']?></textarea></td>
                                <td style="text-align: center"><?php echo $item['view']?></td> 
                                <td style="text-align: center"><?php echo $item['create_time']?></td>   
                                <td style="text-align: center"><a href="home.php?sk=sp&m=edit&id=<?php echo $item['id_pro']?>" class="btn btn-warning">Sửa</a></td>  
                                <td style="text-align: center"><a onclick="deleteData(<?php echo $item['id_pro']?>)" class="btn btn-danger">Xóa</a></td>  
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
                    window.location.href = "?sk=sp&m=delete&id="+id;
                  }
                  else{
                    window.location.href = "?sk=sp";
                  }
                }
                $(document).ready(function() {
                  $("#btnsearch").click(function () {
                    keyword = $.trim($("#txtsearch").val());
                    window.location.href = "?sk=sp&m=index&page=1&keyword="+keyword;
                  });
                });
              </script>