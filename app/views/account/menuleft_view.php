<section class="container">
  <div class="sidebar-sticky" style="width: 20%; height: 1000px; float: left;">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="?cn=dangki&m=edit&id=<?php echo $_SESSION['id']?>">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Thông tin cá nhân
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?cn=dangki&m=order">
              <svg  width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              Đơn hàng
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?cn=dangki&m=editpass&id=<?php echo $_SESSION['id']?>">
          <svg  width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
         ĐỔi mật khẩu
      </a>
  </li>
</ul>   
</div>