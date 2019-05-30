<div class="content-wrapper right_col">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
            	<h3><?php $msg->display(); ?></h3>
            	<h2 class="text-center">Sửa thông tin sản phẩm</h2>
            	<a href="?sk=sp" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
            	<br/><br/>
            	<form action="?sk=sp&m=edit&id=<?php echo $dataEditPr['id_pro']; ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtName">Tên sản phẩm</label>
						<input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $dataEditPr['name_pro']; ?>" placeholder="Tên sản phẩm....">
					</div>
					<div class="form-group">
						<label for="txtSelectIdLoai">Loại sản phẩm</label>
						<select name="txtSelectIdLoai" id="txtSelectId" class="form-control">
							<?php if(!empty($dataA)): ?>
								<?php foreach($dataA as $item):?>
									<option value="<?php echo $item['id']?>"><?php echo $item['nametype']?></option>
								<?php endforeach ?>
							<?php endif?>
						</select>
					</div>
					<div class="form-group">
						<label for="txtSelectId">Hãng sản phẩm</label>
						<select name="txtSelectId" id="txtSelectId" class="form-control">
							<?php if(!empty($dataG)): ?>
								<?php foreach($dataG as $item):?>
									<option value="<?php echo $item['id_cate']?>"><?php echo $item['name']?></option>
								<?php endforeach ?>
							<?php endif?>
						</select>
					</div>
					<div class="form-group">
						<label for="txtPrice">Giá</label>
						<input type="text" class="form-control" id="txtPrice" name="txtPrice" value="<?php echo $dataEditPr['price']; ?>" placeholder="Giá....">
					</div>
					<div class="form-text">
						<label for="txtContent">Chi tiết</label>
   						<textarea class="form-control" id="txtContent" name="txtContent" rows="5" placeholder="Chi tiết sản phẩm..."><?php echo $dataEditPr['content']; ?></textarea>
					</div>
					<div class="form-group">
						<p>Hình ảnh</p>
					    <img  style="width: 100px;" src="<?php echo PATH_UPLOAD_PRODUCT . "/" .$dataEditPr['image']; ?>" alt="<?php echo $dataEditPr['image']; ?>" />
					</div>
					<div class="form-group">
					    <label for="txtFileImage">Chọn Logo mới</label>
					    <input type="file" id="txtFileImage" name="txtFileImage" src="<?php echo PATH_UPLOAD_PRODUCT . "/" .$dataEditPr['image']; ?>" />
					    <input type="hidden" name="hddFile" value="<?php echo $dataEditPr['image']; ?>">
					    <p class="help-block">'.jpg','.png'.</p>
					</div>
					<button type="submit" name="btnSubmitEdit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>  Sửa</button>
				</form>	
            </div>
        </div>
    </div>
</div>