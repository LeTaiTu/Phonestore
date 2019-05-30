<?php 

if(isset($_GET['action']) && $_GET['action']=="add"){ 
    $conn = mysqli_connect('localhost', 'root', '', 'phonestores');
    mysqli_set_charset($conn, 'UTF8');
    $id=intval($_GET['id']); //chuyển sang kiểu số nguyên

    if(isset($_SESSION['cart'][$id])){ 

        $_SESSION['cart'][$id]['quantity']++;
    }else{ 

        $sql_s="SELECT * FROM products 
        WHERE id_pro={$id}"; 
        $query_s=mysqli_query($conn,$sql_s); 
        if(mysqli_num_rows($query_s)!=0){ 
            $row_s=mysqli_fetch_array($query_s); 
            $_SESSION['cart'][$row_s['id_pro']]=array( 
                "namepro" => $row_s['name_pro'],
                "quantity" => 1, 
                "price" => $row_s['price'] 
            ); 
            // var_dump($_SESSION['cart'][$row_s['id_pro']]['namepro']);die();
        }else{ 

            $message="This product id it's invalid!"; 

        }
    } 
} 

?>       
<div id="right">
    <section class="b-detail-holder">
        <article class="title-holder">
            <div class="span6">
                <h2><?php echo $model['name_pro'] ?></h2>
            </div>
        </article>
        <div class="book-i-caption">
            <div class="span6 b-img-holder">
                <span class='zoom' id='ex1'> <img src='<?php echo PATH_UPLOAD_PRODUCT . "/" .$model['image']; ?>' height="219" width="300" id='jack' alt=''/></span>
            </div>
            <div class="span6">

                <p class="text_chi_tiet">Giá bán: <span class="giamoi_chitiet"><?php echo number_format($model['price'])?> ₫</span></p>
                <p class="text_chi_tiet">Số lượt xem: <?php echo number_format($model['view'])?></p>
                <strong class="title">Khuyến mãi</strong>
                <p class="text">Không có</p>
                <div class="comm-nav">
                    <a class="btn btn-primary" href="index.php?cn=index&m=detail&slug=<?php echo $model['id_pro']; ?>&action=add&id=<?php echo $model['id_pro'] ?>"> Thêm vào giỏ hàng</a>
                </div>
                <br>
                <span class="text_chi_tiet"><input type="checkbox" name=""><b> Yêu cầu nhân viên kỹ thuật giao hàng: </b> hỗ trợ copy danh bạ, hướng dẫn sử dụng máy mới, giải đáp thắc mắc về sản phẩm</span>
                <br>
                <br>
                <p class="text_chi_tiet">Gọi đặt mua:<a> 1800.1001</a> (miễn phí - 7:30-22:00)</p>
            </div>
        </div>
        <!-- Chi tiết -->
        <section class="reviews-section">
            <div class="r-title-bar">
                <strong>Chi tiết sản phẩm</strong>
            </div>
            <ul class="review-list">
                <p><?php echo str_replace("-","<br><br>",$model['content']) ?></p>
            </ul>
        </section>
        <!-- Phản hồi -->
        <section class="reviews-section">
            <div class="r-title-bar">
                <strong>Phản Hồi Về Sản Phẩm</strong>
            </div>
            <div class="comm-nav">
                <?php if(isset($_SESSION['email'])):?>
                    <form method="POST" action="?cn=index&m=comment" class="form-data">
                        <textarea rows="4" name="txtComment" placeholder="Bình luận về sản phẩm..." class="form-control"></textarea>
                        <br>
                        <input type="hidden" name="id_product" value="<?php echo $model['id_pro']?>">
                        <input type="hidden" name="id_customer" value="<?php echo $_SESSION['id']?>">
                        <button type="submit" class="btn btn-primary" name="btnSubmit" style="float: right; width: 100px;">Gửi <i class="fa fa-share"></i></button>
                    </form>
                <?php endif?>
            </div>
            <div class="r-title-bar"></div>
            <?php foreach($dataFeed as $data):?>
                <?php if($model['id_pro']==$data['id_product']):?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="col-sm-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong><?php echo $data['name'] ?></strong> <span class="text-muted"> vào lúc <?php echo $data['create_time']?></span>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $data['content'] ?>
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div>
                    </div>
                <?php endif?>
            <?php endforeach ?>
        </section>
    </section>
    <section>
        <div>
            <div class="fb-comments" data-width="100%" data-numposts="5"></div>
        </div>
    </section>
</div>
</section>