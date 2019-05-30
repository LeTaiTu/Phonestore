<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Thêm thành viên</h2>
            	<a href="?sk=thanhvien" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=thanhvien&m=create" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtName">Tên thành viên</label>
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Tên thành viên....">
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
						<input type="date" class="form-control" id="txtDate" name="txtDate">
					</div>
					<div class="form-group">
					    <label for="txtPhone">Email</label>
					    <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email...">
					</div>
					<div class="form-group">
					    <label for="txtAddress">Địa chỉ</label>
					    <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Địa chỉ...">
					</div>
					<div class="form-group">
						<label for="txtPhone">Số điện thoại</label>
						<input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Số điện thoại....">
					</div>
					<div class="form-group">
						<label for="txtPassword">Mật khẩu</label>
						<input type="text" class="form-control" id="txtPassword" name="txtPassword" placeholder="Mật khẩu....">
					</div>
					<button type="submit" name="btnSubmit" class="btn btn-info">Thêm</button>
				</form>	
            </div>
        </div>
    </div>
</div>