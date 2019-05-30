<div class="row" style="width: 80%; height: 1000px; float: right;">
  <div class="main-content">
    <h2 class="text-center">Hồ sơ của tôi</h2>
    <h3><?php $msg->display(); ?></h3>
    <form action="?cn=dangki&m=edit" method="post" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="form-group">
            <label for="txtPhone">Số điện thoại</label>
            <input type="text" class="form-control" id="txtPhone" name="txtPhone" value="<?php echo $dataEditCt['phone']; ?>" >
          </div>
          <div class="form-group">
            <label for="txtName">Tên</label>
            <input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $dataEditCt['name']; ?>" >
          </div>
          <div class="form-group">
            <label for="txtAddress">Địa chỉ</label>
            <input type="text" class="form-control" id="txtAddress" name="txtAddress" value="<?php echo $dataEditCt['address']; ?>" >
          </div>
          <div class="form-group">
              <label for="txtSex">Giới tính</label>
              <select class="form-control" name="txtSex" id="txtSex">
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
              </select>
          </div>
          <div class="form-group">
            <label for="txtDate">Ngày sinh</label>
            <input type="date" class="form-control" id="txtDate" name="txtDate" value="<?php echo $dataEditCt['birthday'] ?>">
          </div>
          <button type="submit" name="btnSubmitEdit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  Thay đổi</button>
    </form>
    
  </div>

</div>
</section>


</section>
</section>