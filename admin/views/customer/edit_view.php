<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Sửa thông tin khách hàng</h2>
            	<a href="?sk=tacgia" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=thanhvien&m=edit&id=<?php echo $dataEditCt['id']; ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtName">Tên khách hàng</label>
						<input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $dataEditCt['name']; ?>" placeholder="Tên tác giả....">
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
					<div class="form-group">
						<label for="txtEmail">Email</label>
						<input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $dataEditCt['email']; ?>" placeholder="Email....">
						<input type="hidden" class="form-control" id="hddEmail" name="hddEmail" value="<?php echo $dataEditCt['email']; ?>">
					</div>
					<div class="form-group">
						<label for="txtAdress">Địa chỉ</label>
						<input type="text" class="form-control" id="txtAddress" name="txtAddress" value="<?php echo $dataEditCt['address']; ?>" placeholder="Địa chỉ....">
					</div>
					<div class="form-group">
					    <label for="txtPhone">Số điện thoại</label>
					    <input type="text" class="form-control" id="txtPhone" name="txtPhone" value="<?php echo $dataEditCt['phone']; ?>" placeholder="Điện thoại...">
					</div>
					<div class="form-group">
					    <label for="txtPassword">Mật khẩu</label>
					    <input type="text" class="form-control" id="txtPassword" name="txtPassword" value="<?php echo $dataEditCt['password']; ?>" placeholder="Mật khẩu...">
					</div>
					<button type="submit" name="btnSubmitEdit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  Sửa</button>
				</form>	
            </div>
        </div>
    </div>
</div>