<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Thêm mặt hàng</h2>
            	<a href="?sk=mathang" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=mathang&m=create" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtName">Tên mặt hàng</label>
						<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Tên mặt hàng....">
					</div>
					<button type="submit" name="btnSubmit" class="btn btn-info">Thêm</button>
				</form>	
            </div>
        </div>
    </div>
</div>