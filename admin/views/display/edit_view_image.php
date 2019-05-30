<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Sửa thông giao diện</h2>
            	<a href="?sk=giaodien" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=giaodien&m=edit&id=<?php echo $dataEdit['id']; ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<p>Logo</p>
					    <img  style="width: 100px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEdit['logo']; ?>" alt="<?php echo $dataEdit['logo']; ?>" />
					</div>
					<div class="form-group">
					    <label for="txtFileLogo">Chọn Logo mới</label>
					    <input type="file" id="txtFileLogo" name="txtFileLogo" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEdit['logo']; ?>" />
					    <input type="hidden" name="hddFile" value="<?php echo $dataEdit['logo']; ?>">
					    <p class="help-block">'.jpg','.png'.</p>
					</div>

					<div class="form-group">
						<p>Header</p>
					    <img  style="width: 100px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEdit['header']; ?>" alt="<?php echo $dataEdit['header']; ?>" />
					</div>
					<div class="form-group">
					    <label for="txtFileHeader">Chọn Header mới</label>
					    <input type="file" id="txtFileHeader" name="txtFileHeader" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEdit['header']; ?>" />
					    <input type="hidden" name="hddFile" value="<?php echo $dataEdit['header']; ?>">
					    <p class="help-block">'.jpg','.png'.</p>
					</div>
					
					<div class="form-group">
						<p>Footer</p>
					    <img  style="width: 100px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEdit['footer']; ?>" alt="<?php echo $dataEdit['footer']; ?>" />
					</div>
					<div class="form-group">
					    <label for="txtFileFooter">Chọn Footer mới</label>
					    <input type="file" id="txtFileFooter" name="txtFileFooter" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEdit['footer']; ?>" />
					    <input type="hidden" name="hddFile" value="<?php echo $dataEdit['footer']; ?>">
					    <p class="help-block">'.jpg','.png'.</p>
					</div>
					<button type="submit" name="btnSubmitEdit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  Sửa</button>
				</form>	
            </div>
        </div>
    </div>
</div>