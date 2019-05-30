<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $conn = mysqli_connect('localhost', 'root', '', 'phonestores');
mysqli_set_charset($conn, 'UTF8');?>

<style type="text/css">
  .table > tbody > tr > td {
    vertical-align: middle;
  }
  .myinput{width: 320px;}
</style>
<div class="row">
  <h3 class="text-center"></h3>
  <h3><?php $msg->display() ?></h3>
</div>
<div class="heading-bar">
  <a class="more-btn">Tiến hành kiểm tra</a>
</div>

<div class="table_gio_hang">
  <form method="POST" action="#" accept-charset="utf-8" id="form_gio_hang">
    <table class="table table-hover table-striped" style="margin: 0px;padding: 0px;">
      <tr>
        <th>&nbsp;Mã sản phẩm</th>
        <th>Tên điện thoại</th>
        <th>Ảnh</th>
        <th class="center1">Giá</th>
        <th class="center1">Số lượng</th>
        <th class="center1" >Thành tiền</th>
        <th>Xóa</th>
      </tr>
      <?php 
      if (isset($_SESSION['cart'])) {
       $sql = '';
       $sql .= "SELECT * FROM products WHERE id_pro IN ("; 

       foreach($_SESSION['cart'] as $idd => $value) { 
        $sql .= $idd."," ; 
      } 
      $sql=substr($sql, 0, -1).") ORDER BY name_pro ASC"; 
      $query=mysqli_query($conn,$sql); 
      $totalprice=0; 
      $arrayid = [];
      $arraypro = [];
      $arrayprice = [];
      $arrayquantity = [];
      while($row=mysqli_fetch_array($query)){ 
        // var_dump($_SESSION['cart'][$row['id_pro']]['namepro']);die();
        $subtotal=$_SESSION['cart'][$row['id_pro']]['quantity']*$row['price']; 
        $totalprice+=$subtotal;
        array_push($arrayid, $row['id_pro']);
        array_push($arraypro, $_SESSION['cart'][$row['id_pro']]['namepro']);
        array_push($arrayprice, $_SESSION['cart'][$row['id_pro']]['price']);
        array_push($arrayquantity, $_SESSION['cart'][$row['id_pro']]['quantity']);
        // var_dump($_SESSION['cart'][$row['id_pro']]['namepro']);die();
        ?> 

        <tr>
          <td><?php echo $row['id_pro']; ?></td>
          <td><?php echo $_SESSION['cart'][$row['id_pro']]['namepro']; ?></td>
          <td>
            <img src="<?php echo PATH_UPLOAD_PRODUCT . "/" .$row['image']; ?>" alt="">
          </td>
          <td class="center1"><?php echo $_SESSION['cart'][$row['id_pro']]['price']; ?></td>
          <td class="center1" ><input class="soluong1" required pattern="[0-9]{1,3}" title="Số lượng phải là chữ số và nhỏ hơn 4 kí tự" name="" size="2" type="text" value="<?php echo $_SESSION['cart'][$row['id_pro']]['quantity']; ?>"/></td>
          <td  class="center1 img_gio_hang"><?php echo $subtotal; ?></td>

          <td >
            <a href="?cn=index&m=deletecart&action=one&id=<?php echo $row['id_pro']; ?>"> <i class="icon-trash"></i></a>
          </td>
        </tr>

        <?php 
      }  
    } 
    ?> 
    <tr>
      <td colspan="5">Tổng tiền: </td>
      <td class="center1"> <span><?php if(isset($_SESSION['cart']))echo $totalprice; ?></span></td>
      <td></td>
    </tr>
    <tr>
      <td colspan="7" style="text-align: right">
        <button type="submit" style="" class="btn btn-info">Cập nhật giỏ hàng</button>
        <a href="?cn=index&m=deletecart&action=all" class="btn btn-warning">Xóa tất cả</a>
      </td>
    </tr>
  </table>
</form>
</div>

<div class="heading-bar">
  <a class="more-btn">Kiểm tra lại thông tin đặt hàng</a>
</div>
<div class="table_gio_hang">
  <form id="enableForm3" action="?cn=index&m=buy" method="POST" class="form-horizontal" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <input class="myinput" type="hidden" value="<?php echo implode("-",$arrayid); ?>" class="form-control" name="txtIdProduct" />
        <input class="myinput" type="hidden" value="<?php echo implode("-",$arraypro);?>" class="form-control" name="txtProduct" />
        <input class="myinput" type="hidden" value="<?php echo implode("-",$arrayprice);?>" class="form-control" name="txtPrice" />
        <input class="myinput" type="hidden" value="<?php echo implode("-",$arrayquantity);?>" class="form-control" name="txtQuantity" />
        <input class="myinput" type="hidden" value="<?php echo $totalprice ?>" class="form-control" name="txtAmount" />
        <div class="form-group">
          <label class="col-md-5 control-label">Họ Tên (*)</label>
          <div class="col-md-7">
            <input class="myinput" type="text" value="<?php echo $_SESSION['name']?>" class="form-control" name="txtName" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-5 control-label">Số điện thoại (*)</label>
          <div class="col-md-7">
            <input class="myinput" type="text" value="<?php echo $_SESSION['phone']?>" class="form-control" name="txtPhone" />
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
        <div class="form-group">
          <label class="col-md-5 control-label">Địa chỉ (*)</label>
          <div class="col-md-7">
            <input class="myinput" type="text"  value="<?php echo $_SESSION['address']?>" class="form-control" name="txtAddress" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-5 control-label">Ghi chú</label>
          <div class="col-md-7">
            <textarea style="width: 550px;" name="txtNote" ></textarea>
          </div>
        </div>
      </div>
      <div class="form-group">
        <?php if(isset($_SESSION['email'])):?>
          <input type="submit" name="btnSubmit" class="btn btn-info btn-block" value="Đặt hàng"/>
          <?php else:?>
            <a href="index.php?cn=dangki&m=login"> Bạn cần đăng nhập để đặt hàng!</a>
            <input type="button" class="btn btn-info btn-block" value="Đặt hàng">

          <?php endif?>
        </div>
      </div>
    </form>
  </div>
</section>
</section>