<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Tài khoản</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/thong-tin-tai-khoan')}}">Thông tin tài khoản</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/doi-mat-khau')}}">Đổi mật khẩu</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/du-lieu-nhan-dien')}}">Dữ liệu nhận diện</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('kenh-giao-hang/quan-ly-don-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Quản lý đơn hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('kenh-giao-hang/nhan-don-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Nhận đơn hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Thanh toán</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/rut-tien')}}">Rút tiền</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/lich-su-giao-dich')}}">Lịch sử giao dịch</a></li>
        </ul>
      </div>
    </li>
  

  </ul>
</nav>
