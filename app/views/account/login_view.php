<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
      <?php
      $mess = isset($_GET['message']) ? $_GET['message'] : '';
      ?>
      <b><?php echo $mess ?></b>
      <legend><i class="glyphicon glyphicon-globe"></i></a> Đăng nhập!
      </legend> 
      <form action="?cn=dangki&m=login" method="post" class="form" role="form"> 
        <label>Email</label>
        <input class="form-control" name="txtEmail" placeholder="Email đăng nhập..." required="" type="email"> 
        <label>Mật khẩu</label>
        <input class="form-control" name="txtPassword" placeholder="Mật khẩu..." type="password" aria-autocomplete="list" required=""> 
        <button class="btn btn-lg btn-primary" type="submit" name="btnSubmit"> Đăng nhập</button> 
        <button class="btn btn-lg btn-primary" type="reset" name="btnReset"> Nhập lại</button>
      </form> 
    </div> 
  </div>
</div>
</section>
</section>