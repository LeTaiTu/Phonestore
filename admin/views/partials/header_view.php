<?php 
    ob_start(); // khai báo nơi lưu dữu liệu tạm thời trên server
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHONE</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link href="../public/css/styleadmin.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../public/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../public/css/_all-skins.min.css">
        <link rel="stylesheet" href="../public/css/display.css">
        <!-- jquery -->
        <script src="../public/js/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/app.min.js"></script>
        <script src="../public/js/admin1.js"></script>
        <script src="../public/js/formValidation.min1.js" type="text/javascript"></script>
        <script src="../public/js/formValidation.min2.js" type="text/javascript"></script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="../public/images/admin.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">
                                        Xin chào, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="../public/images/admin.png" class="img-circle" alt="User Image">
                                        <p>
                                             <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../public/images/admin.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" id="menu1">
                        <li>
                            <a href="#"><i class="fa fa-home"></i>Trang chủ</a>
                        </li>
                        <li>
                            <a href="?sk=thanhvien"><i class="fa fa-user"></i>Thành viên</a>
                        </li>
                        <li>
                            <a href="?sk=giaodien"><i class="fa fa-wrench"></i>Giao diện</a>
                            <ul class="sidebar-menu" id="menu2">
                                <li>
                                    <a href="?sk=giaodien">Logo</a>
                                </li>
                                <li>
                                    <a href="?sk=slide">Slide</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?sk=mathang"><i class="fa fa-th"></i>Mặt hàng</a>
                        </li>
                        <li>
                            <a href="?sk=loaisp"><i class="fa fa-folder"></i>Danh mục sản phẩm</a>
                        </li>
                        <li>
                            <a href="?sk=sp"><i class="fa fa-folder-open"></i>Sản phẩm </a>
                        </li>
                        <!-- <li>
                            <a href="?sk=donhang"><i class="fa fa-book"></i>Đơn hàng</a>
                        </li> -->
                        <li>
                            <a href="?sk=duyetdon"><i class="fa fa-newspaper-o"></i>Duyệt đơn hàng</a>
                        </li>
                        <!-- <li>
                            <a href="?sk=taikhoan"><i class="fa fa-comment-o"></i>Phản hồi</a>
                        </li> -->
                        <!-- <li>
                            <a><i class="fa fa-th"></i>Thống kê</a>
                        </li> -->
                        <li>
                            <a href="?sk=donhang"><i class="fa fa-file-text"></i>Danh sách hàng đã bán</a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>