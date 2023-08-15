<header class="p-2 pl-3 bg-white" style="width: 100%;position: fixed;z-index: 9999;">
    <div class="container">
        <div class="float-left">
            <div class="mr-4" style="width: 220px;height: 35px;">
                <a href="{{route('index.Home.index')}}" class="d-flex">
                    <p class="mr-2 tx" style="font-size:120%;font-weight: bold;">VMARKET</p>
                    <span class="tx" style="font-size: 80%;margin-top: 6px;">Kênh Shiper</span>
                </a>
            </div>
        </div>
        @if(Auth::user())
        <div class="float-right d-flex">
            <div class="mr-4" style="height: 35px;">
                <a href="{{url('/kenh-giao-hang/nhan-don-hang')}}" class="d-flex">
                    <span class="tx" style="font-size: 80%;margin-top: 6px;">Nhận đơn hàng</span>
                </a>
            </div>
            <div class="mr-4" style="height: 35px;">
                <a href="{{url('/kenh-giao-hang/thong-tin-tai-khoan')}}" class="d-flex">
                    <span class="tx" style="font-size: 80%;margin-top: 6px;">Quản lý tài khoản</span>
                </a>
            </div>
        </div>
        @endif
        <div class="clboth"></div>
    </div>
</header>