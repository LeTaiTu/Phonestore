<div class="row" style="width: 80%; height: 1000px; float: right;">
  <div class="main-content">
    <h2 class="text-center">Đổi mật khẩu</h2>
    <h3><?php $msg->display(); ?></h3>
    <form action="?cn=dangki&m=editpass" method="post" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="form-group">
            <label for="txtPass">Nhập mật khẩu hiện tại</label>
            <input type="password" class="form-control" id="txtPass" name="txtPass" value="" >
          </div>
          <div class="form-group">
            <label for="txtNewpass">Nhập mật khẩu mới</label>
            <input type="password" class="form-control" id="txtNewpass" name="txtNewpass" value="" >
          </div>
          <div class="form-group">
            <label for="txtRepass">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="txtRepass" name="txtRepass" value="" >
          </div>
          <button type="submit" name="btnSubmit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  ĐỔi mật khẩu</button>
    </form>
    
  </div>

</div>
</section>


</section>
</section>