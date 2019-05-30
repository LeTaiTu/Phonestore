<div class="row" style="width: 80%; height: 1000px; float: right;">
  <div class="main-content">
  <h2>Danh sách đơn hàng đã đặt</h2>
   <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr >
        <th style="text-align: center">Sản phẩm</th>
        <th style="text-align: center">Tình trạng đơn hàng</th>
        <th style="text-align: center">Cập nhật lúc</th>
        <th style="text-align: center">Thời gian đặt hàng</th>
        <th style="text-align: center"></th>
      </tr>
      <?php foreach($datas as $data):?>
        <?php if($data['id_customer']==$_SESSION['id']):?>
        <tr>
          <td><?php echo str_replace("-"," và ",$data['name_product'])?></td>
          <td>
            <?php if($data['order_status']==0){ echo "Đang chờ xử lý...";}
                  if($data['order_status']==1){echo "Đang gửi hàng";}
                  if($data['order_status']==3){ echo "Đã xong đơn";}
            ?>
            <?php if($data['order_status']==2):?>
              <a class="btn btn-primary" href="?cn=dangki&m=done&id=<?php echo $data['id']?>">Nhấn khi đã nhận hàng</a>
            <?php endif?>
          </td>
          <td><?php echo $data['update_time']?></td>
          <td><?php echo $data['create_time']?></td>
          <td><a href="?cn=dangki&m=orderdetail&idd=<?php echo $data['id_order']?>">Chi tiết đơn hàng</a></td>
        </tr>
      <?php endif?>
      <?php endforeach?>
    </thead>
  </table>
</div>

</div>
</section>


</section>
</section>