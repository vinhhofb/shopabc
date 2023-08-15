<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Account</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/thong-tin-tai-khoan')}}">Basic information</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/doi-mat-khau')}}">Change Password</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/du-lieu-nhan-dien')}}">Data Face</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('kenh-giao-hang/quan-ly-don-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Manage Order</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('kenh-giao-hang/nhan-don-hang')}}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Receive purchase order</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Payment</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/rut-tien')}}">Withdraw</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('kenh-giao-hang/lich-su-giao-dich')}}">Transaction history</a></li>
        </ul>
      </div>
    </li>
  

  </ul>
</nav>
