<div class="content-wrapper right_col">
	<div class="row">
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="main-content">
				<h3><?php $msg->display(); ?></h3>
				<h2 class="text-center">Thêm ảnh trình chiếu</h2>
				<a href="?sk=slide" title="" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>   Trở lại</a>
				<br/><br/>
				<form action="?sk=slide&m=create" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtSelect">Loại sản phẩm</label>
						<select name="txtSelect" class="form-control">
							<?php if(!empty($dataA)): ?>
								<?php foreach($dataA as $item):?>
									<option value="<?php echo $item['id']?>"><?php echo $item['nametype']?></option>
								<?php endforeach ?>
							<?php endif?>
						</select>
					</div>
					<div class="form-group">
					    <label for="txtFileImage">Chọn Ảnh</label>
					    <input type="file" id="txtFileImage" name="txtFileImage">
					    <p class="help-block">Ví dụ: '.jpg .png'</p>
					</div>
					<button type="submit" name="btnSubmit" class="btn btn-info">Thêm</button>
				</form>	
			</div>
		</div>
	</div>
</div>