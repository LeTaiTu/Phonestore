<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Sửa thông tin loại sản phẩm</h2>
            	<a href="?sk=loaisp" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=loaisp&m=edit&id=<?php echo $dataEditCg['id_cate']; ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtName">Tên hãng</label>
						<input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $dataEditCg['name']; ?>" placeholder="Tên hãng....">
					</div>
					<div class="form-group">
						<p>Logo</p>
					    <img  style="width: 100px;" src="<?php echo PATH_UPLOAD_CATEGORY . "/" .$dataEditCg['logo']; ?>" alt="<?php echo $dataEditCg['logo']; ?>" />
					</div>
					<div class="form-group">
					    <label for="txtFileLogo">Chọn Logo mới</label>
					    <input type="file" id="txtFileLogo" name="txtFileLogo" src="<?php echo PATH_UPLOAD_CATEGORY . "/" .$dataEditCg['logo']; ?>" />
					    <input type="hidden" name="hddFile" value="<?php echo $dataEditCg['logo']; ?>">
					    <p class="help-block">'.jpg','.png'.</p>
					</div>
					<button type="submit" name="btnSubmitEdit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  Sửa</button>
				</form>	
            </div>
        </div>
    </div>
</div>