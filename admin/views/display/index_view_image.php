
<div class="content-wrapper right_col" id="right1">
	<div class="row">
		<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="main-content">
				<?php echo $msg->display() ?>
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr >
							<th style="text-align: center">ID</th>
							<th style="text-align: center">Logo</th>
							<th style="text-align: center">Header</th>
							<th style="text-align: center">Footer</th>
							<th style="text-align: center">Cập nhật</th>
							<th style="text-align: center">Sửa </th>
						</tr>
					</thead>

					<tbody>
						<?php if(!empty($data)): ?>
							<?php foreach($data as $item):?>
								<tr>
									<td style="text-align: center"><?php echo $item['id'] ?></td>   
									<td style="text-align: center"><img style="height:100px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$item['logo']; ?>" alt="<?php $item['logo']; ?>"></td>
									<td style="text-align: center"><img style="height:30px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$item['header']; ?>" alt="<?php $item['header']; ?>"></td>
									<td style="text-align: center"><img style="height: 30px;" src="<?php echo PATH_UPLOAD_IMAGE . "/" .$item['footer']; ?>" alt="<?php $item['footer']; ?>"></td>
									<td style="text-align: center"><?php echo $item['update_time']?></td>   
									<td style="text-align: center"><a href="home.php?sk=giaodien&m=edit&id=<?php echo $item['id']?>" class="btn btn-warning">Sửa</a></td>  
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("#btnsearch").click(function () {
			keyword = $.trim($("#txtsearch").val());
			window.location.href = "?sk=giaodien&m=index&page=1&keyword="+keyword;
		});
	});
</script>