<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="right">

    <?php if (!empty($dataHangSps)): ?>
        <?php foreach ($dataHangSps as $data):?>
            <h3> <?php echo $data['name']; ?></h3>
            <section class="grid-holder features-books">
              <!-- //noi nay de phan trang -->
              <!-- <?php echo $paging['html']?> -->
          </section>
          <section class="grid-holder features-books">
            <?php if (!empty($dataSps)): ?>
                <?php foreach ($dataSps as $key => $model) :?>
                    <?php if ($data['id_cate']==$model['id_category']): ?>
                        <?php if ($model['id_type']==3): ?>
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
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>    
        </section>
        <div style="clear: both;"></div>
    <?php endforeach; ?>
<?php endif; ?>

</section>