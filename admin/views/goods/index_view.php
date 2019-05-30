            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper right_col" id="right1">
              <div class="row">
                <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="main-content">
                    <?php echo $msg->display() ?>

                    <div class="col-md-3">
                      <a href="?sk=mathang&m=create" title="" class="btn btn-info" style="margin-bottom:20px; ">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>  Thêm mới mặt hàng</a>
                      </div>
                      <table class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr >
                            <th style="text-align: center">Tên</th>
                            <th style="text-align: center">Xóa</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php if(!empty($data)): ?>
                            <?php foreach($data as $item):?>
                              <tr>
                                <td style="text-align: center"><?php echo $item['nametype'] ?></td>  
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
                    window.location.href = "?sk=mathang&m=delete&id="+id;
                  }
                  else{
                    window.location.href = "?sk=mathang";
                  }
                }
              </script>