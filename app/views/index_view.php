
<div id="right">
    <?php if (!empty($dataLoais)): ?>
        <?php foreach ($dataLoais as $data):?>
            <h3> <?php echo $data['nametype']; ?> MỚI</h3>
            <section class="grid-holder features-books">
              <!-- //noi nay de phan trang -->
              <!-- <?php echo $paging['html']?> -->
          </section>
          <section class="grid-holder features-books">
            <?php if (!empty($dataSps)): ?>
                <?php foreach ($dataSps as $key => $model) :?>
                    <?php if ($data['id']==$model['id_type']): ?>
                            <figure class="span4 slide first chinh1" style="position: relative;">
                                <a href="index.php?cn=index&m=detail&slug=<?php echo $model['id_pro']; ?>&view=<?php echo $model['view']?>"><img style="height: 200px; width: 140px" src="<?php echo PATH_UPLOAD_PRODUCT . "/" .$model['image']; ?>" alt="" class="pro-img"/></a>
                                <p>
                                    <span class="title">
                                        <a href="index.php?cn=index&m=detail&slug=<?php echo $model['id_pro'];?>&view=<?php echo $model['view']?>" style="font-weight: bold"><?php echo $model['name_pro'];?></a>
                                    </span>
                                </p>
                                <p>Hãng:
                                    <i style="color: blue;"><?php echo $model['name'];?></i>
                                </p>
                                <p>
                                    <i class="fa fa-eye" aria-hidden="true"></i> Lượt xem:  <?php echo $model['view'];?>
                                </p>
                                <div class="cart-price">
                                    <span class="price"> Giá: <?php echo $model['price'];?> đ</span>
                                </div>
                            </figure>
                            <?php if($key>1){ 
                                break; 
                            }?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>    
        </section>
        <div style="clear: both;"></div>
    <?php endforeach; ?>
<?php endif; ?>

</section>