            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper right_col" id="right1">
              <div class="row">
                <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="main-content">
                    <?php echo $msg->display() ?>

                    <div class="col-md-3">
                        <a href="?sk=duyetdon" title="" class="btn btn-danger" style="margin-bottom:20px; ">Xem tất cả</a>
                      </div>
                      <div class="col-md-9">
                        <button type="button" class="btn btn-info pull-right" id="btnsearch" name="btnsearch">Search</button>
                        <input type="text" class="form-control pull-right" style="width: 300px;" name="txtsearch" id="txtsearch" value="<?php if (!empty($dataAll)) {echo $keyword;} ?>" placeholder="Tìm kiếm theo tên khách hàng...">
                          
                        
                      </div>
                      <table class="table table-hover table-bordered table-striped">
                        <thead>
                          <tr >
                            <th style="text-align: center">Mã đơn hàng</th>
                            <th style="text-align: center">Tên khách hàng</th>
                            <th style="text-align: center">Sản phẩm</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Đơn giá</th>
                            <th style="text-align: center">Tổng tiền</th>
                            <th style="text-align: center">Trạng thái</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php if(!empty($dataAll)): ?>
                            <?php foreach($dataAll as $key => $item):?>
                              <?php if($item['order_status']==3): ?>
                              <tr>
                                <td><?php echo $item['id'] ?></td>
                                <td><?php echo $item['name_customer'] ?></td>
                                <td><?php echo str_replace("-","<br><br>",$item['name_product']) ?></td>
                                <td style="text-align: center"><?php echo str_replace("-","<br><br>",$item['quantity'])?></td>
                                <td style="text-align: center"><?php echo str_replace("-","<br><br>",$item['price'])?></td>
                                <td style="text-align: center"><?php echo $item['amount']?></td>  
                                <td style="text-align: center">Đã hoàn thành đơn</td>  
                              </tr>
                            <?php endif?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                      <div class="text-center">
                        <?php if (!empty($dataAll)) {
                          echo $paging['html'];
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                  $("#btnsearch").click(function () {
                    keyword = $.trim($("#txtsearch").val());
                    window.location.href = "?sk=duyetdon&m=index&page=1&keyword="+keyword;
                  });
                });
              </script>