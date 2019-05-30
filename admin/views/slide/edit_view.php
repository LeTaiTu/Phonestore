<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Sửa thông tin sản phẩm</h2>
            	<a href="?sk=slide" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=slide&m=edit&id=<?php echo $dataEditSl['id_slide']; ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtSelect">Loại sản phẩm</label>
						<select name="txtSelect" id="txtSelect" class="form-control">
							<?php if(!empty($dataA)): ?>
								<?php foreach($dataA as $item):?>
									<option value="<?php echo $item['id']?>"><?php echo $item['nametype']?></option>
								<?php endforeach ?>
							<?php endif?>
						</select>
					</div>
					<div class="form-group">
						<p>Hình ảnh</p>
					    <img  style="width: 100px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEditSl['image']; ?>" alt="<?php echo $dataEditSl['image']; ?>" />
					</div>
					<div class="form-group">
					    <label for="txtFileImage">Chọn Logo mới</label>
					    <input type="file" id="txtFileImage" name="txtFileImage" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$dataEditSl['image']; ?>" />
					    <input type="hidden" name="hddFile" value="<?php echo $dataEditSl['image']; ?>">
					    <p class="help-block">'.jpg','.png'.</p>
					</div>
					<button type="submit" name="btnSubmitEdit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  Sửa</button>
				</form>	
            </div>
        </div>
    </div>
</div>