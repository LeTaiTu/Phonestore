<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
      <?php echo $msg->display() ?>
     <legend><i class="glyphicon glyphicon-globe"></i></a> Đăng ký thành viên!
     </legend> 
     <form action="?cn=dangki&m=create" method="post" class="form" role="form"> 
      <label>Họ tên</label>
      <input class="form-control" name="txtName" placeholder="Họ tên" required="" type="text"> 
      <label>Email</label>
      <input class="form-control" name="txtEmail" placeholder="Email đăng nhập..." required="" type="email"> 
      <label>Mật khẩu</label>
      <input class="form-control" name="txtPassword" placeholder="Mật khẩu..." type="password" aria-autocomplete="list" required=""> 
      <label>Nhập lại mật khẩu</label>
      <input class="form-control" name="txtRepassword" placeholder="Nhập lại mật khẩu..." type="password" required="">
      <label>Số điện thoại</label>
      <input class="form-control" name="txtPhone" placeholder="Số điện thoại..." type="number" aria-autocomplete="list" required=""> 
      <label>Ngày sinh</label> 
      <input class="form-control" name="txtDate" required="" type="date">
      <label for=""> Địa chỉ </label> 
      <input class="form-control" type="text" name="txtAddress" placeholder="Địa chỉ để nhận hàng..." required="">
      <label>Giới tính</label><br>
      <label class="radio-inline">Nam</label>          
      <input name="sex" id="inlineCheckbox1" value="0" type="radio"> 
      <label class="radio-inline"> Nữ </label>           
        <input name="sex" id="inlineCheckbox2" value="1" type="radio"> 
        <br> 
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnSubmit"> Đăng ký</button> 
        <button class="btn btn-lg btn-primary btn-block" type="reset" name="btnReset"> Nhập lại</button>
      </form> 
    </div> 
  </div>
</div>
</section>
</section>