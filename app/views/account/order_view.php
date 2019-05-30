<div class="row" style="width: 80%; height: 1000px; float: right;">
  <div class="main-content">
  <h2>Đơn hàng chi tiết</h2>
  <h3><?php $msg->display(); ?></h3>
  <a href="?cn=dangki&m=order" class="btn btn-primary"><i class="fa fa-step-backward" aria-hidden="true"></i> Trở về</a><br/><br/>
   <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr >
        <th style="text-align: center">Mã sản phẩm</th>
        <th style="text-align: center">Tên khách hàng</th>
        <th style="text-align: center">Tên sản phẩm</th>
        <th style="text-align: center">Thông tin</th>
        <th style="text-align: center">Số lượng</th>
        <th style="text-align: center">Đơn giá</th>
        <th style="text-align: center">Tổng giá</th>
        <th style="text-align: center">Trạng thái đơn hàng</th>
        <th style="text-align: center">Thời gian đặt</th>
        <th style="text-align: center">Cập nhật lúc</th>
        <th> Hủy đơn</th>
      </tr>  
        <tr>
          <td style="text-align: center"><?php echo $dataOd['id']?></td>
          <td><?php echo $dataOd['name_customer']?></td>
          <td><?php echo str_replace("-","<br><br>",$dataOd['name_product'])?></td>
          <td><?php echo str_replace("-","<br>",$dataOd['address'])?></td>
          <td style="text-align: center"><?php echo str_replace("-","<br><br>",$dataOd['quantity'])?></td>
          <td style="text-align: center"><?php echo str_replace("-","<br><br>",$dataOd['price'])?></td>
          <td><?php echo $dataOd['amount']?></td>
          <td style="text-align: center"><?php if($dataOd['order_status']==0){ echo "Đang chờ xử lý...";}
                  if($dataOd['order_status']==1){echo "Đang gửi hàng";}
                  if($dataOd['order_status']==3){ echo "Đã xong đơn";}
            ?>
            <?php if($dataOd['order_status']==2):?>
              <a class="btn btn-primary" href="?cn=dangki&m=doneO&id=<?php echo $dataOd['id']?>">Đã nhận</a>
            <?php endif?></td>
          <td><?php echo $dataOd['create_time']?></td>
          <td><?php echo $dataOd['update_time']?></td>
          <?php if($dataOd['id']<1):?>
          <td style="text-align: center"><a class="btn btn-warning" onclick="deleteData(<?php echo $dataOd['id'] ?>)" >Hủy đơn</a></td>
            <?php else:?>
              <td style="text-align: center;">Không thể hủy đơn</td>
            <?php endif?>
        
        </tr>
    </thead>
  </table>
</div>

</div>
<script type="text/javascript" charset="utf-8">
  function deleteData(id) {
    if (confirm("Bạn có muốn xóa?")) {
      window.location.href = "?cn=dangki&m=delete&id="+id;
    }
    else{
      window.location.href = "?cn=dangki&m=orderdetail&idd=<?php echo $dataOd['id'] ?>";
    }
  }
</script>
</section>


</section>
</section>
