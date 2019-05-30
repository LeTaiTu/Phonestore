<div class="content-wrapper right_col">
	<div class="row">
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="main-content">
				<h3><?php $msg->display(); ?></h3>
				<h2 class="text-center">Thêm loại sản phẩm</h2>
				<a href="?sk=loaisp" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
				<br/><br/>
				<form action="?sk=loaisp&m=create" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtName">Tên hãng</label>
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Tên hãng....">
					</div>
					<div class="form-group">
					    <label for="txtFileLogo">Chọn Logo</label>
					    <input type="file" id="txtFileLogo" name="txtFileLogo">
					    <p class="help-block">Ví dụ: '.jpg .png'</p>
					</div>
					<button type="submit" name="btnSubmit" class="btn btn-info">Thêm</button>
				</form>	
			</div>
		</div>
	</div>
</div>