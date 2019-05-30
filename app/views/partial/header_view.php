<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php ob_start(); ?>
<?php
if (isset($_SESSION['cart'])) {
    if (isset($_SESSION['email'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'phonestores');
        mysqli_set_charset($conn, 'UTF8');
        $sql = '';
        $sql .= "SELECT * FROM products WHERE id_pro IN ("; 

        foreach($_SESSION['cart'] as $idd => $value) { 
          $sql .= $idd."," ; 
      } 
      $sql=substr($sql, 0, -1).")"; 
      // var_dump($sql);die();
      $query=mysqli_query($conn,$sql); 
      $subtotal=0;
      

      while($row=mysqli_fetch_array($query)){

        $subtotal+=$_SESSION['cart'][$row['id_pro']]['quantity'];
    }
}

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Cửa hàng điện thoại</title>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="icon" type="image/png" href="app/public/images/logo.png">
    <link href="app/public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="app/public/css/style1.css" rel="stylesheet" type="text/css"/>
    <link href="app/public/css/bs.css" rel="stylesheet" type="text/css"/>
    <link href="app/public/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="app/public/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="app/public/css/range-slider.css" rel="stylesheet" type="text/css"/>
    <link href="app/public/css/prolist.css" rel="stylesheet" type="text/css"/>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="app/public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="app/public/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="app/public/js/lib.js"></script>
    <script type="text/javascript" src="app/public/js/bxslider.js"></script>
    <script src="app/public/js/range-slider.js"></script>
    <script src="app/public/js/jquery.zoom.js"></script>
    <script type="text/javascript" src="app/public/js/bookblock.js"></script>
    <script type="text/javascript" src="app/public/js/custom.js"></script>
    <script type="text/javascript" src="app/public/js/social.js"></script>
    <script src="app/public/js/formValidation.min1.js" type="text/javascript"></script>
    <script src="app/public/js/formValidation.min2.js" type="text/javascript"></script>
    <script src="app/public/js/index1.js" type="text/javascript"></script>
    <!-- <script src="app/public/js/jquery.bpopup.min.js" type="text/javascript"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.social_active').hoverdir( {} );
            $('#ex1').zoom();
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header id="main-header">
            <section class="container-fluid container">
                <section class="row-fluid">
                    <section class="span4">
                        <h1 id="logo"> <a href="?cn=index"><img src="app/public/images/mbrace.png"/></a> </h1>
                    </section>
                    <section class="span8">
                        <ul class="top-nav2">
                            <li><a href="?cn=index&m=add">Giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"> </i><span style="color: red">&nbsp;<?php if(isset($subtotal))echo $subtotal;?></span></a></li>
                            <?php if(isset($_SESSION['email'])):?>
                                <li><a href="?cn=dangki&m=order"><?php echo $_SESSION['name']?></a></li>

                                <li><a href="?cn=dangki&m=logout">Đăng xuất</a></li>
                                <?php else:?>

                                    <li><a href="?cn=dangki&m=login">Đăng nhập</a></li>

                                    <li><a href="?cn=dangki&m=create">Đăng kí</a></li>
                                <?php endif?>

                                <!-- <li><a href="#">Logout</a></li> -->
                            </ul>
                            <div class="col-xs-12 ">
                                <input class="col-md-6 col-xs-10" name="txtSearch" type="text" style="" placeholder="Tìm kiếm" id="txtSearch" value="" />
                                <button id="btnSearch" class="btn btn-info" type="submit" style="height: 35px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </section>
                    </section>
                </section>
                <button id="menu1" style="font-size: 23px;background-color: #E5E5E5;height: 40px;line-height: 40px; width: 40px; text-align: center  " class="navbar-toggler pull-xs-right hidden-sm-up collapsed" type="button" data-toggle="collapse" data-target=".menu1" aria-expanded="false">
                    ☰
                </button>
                <nav id="nav">
                    <nav class="navbar menu1">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li> <a href="?cn=index">TRANG CHỦ</a> </li>
                                <li> <a href="?cn=dienthoai&m=index&keyy=1">ĐIỆN THOẠI</a></li>
                                <li><a href="?cn=dienthoai&m=index&keyy=2">PHỤ KIỆN</a></li>
                                <li><a href="?cn=dienthoai&m=index&keyy=3">LINH KIỆN</a></li>
                                <!-- <li><a href="#">LIÊN HỆ & ĐỊA CHỈ</a></li> -->
                            </ul>
                        </div>
                    </nav>
                </nav>
            </header>
            <section id="content-holder" class="container-fluid container">
                <section class="row-fluid">

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#btnSearch').click(function() {
                                let keyword = $('#txtSearch').val();
                                window.location.href = "?cn=index&m=index&keyword="+keyword;
                            });
                        });
                    </script>