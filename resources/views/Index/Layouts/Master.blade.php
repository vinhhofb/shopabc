<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('Title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('Index/css/style.css')}}">
    @section('Style')
    @show
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="notification-add-to-cart" class=" shadow-sm pl-3" style="width: 200px;height: 50px;background: white;position: fixed;z-index: 999999;right: -200px;margin-top:70px;border-bottom: 3px solid #e03;">
        <span style="line-height:50px">Đã thêm vào giỏ hàng</span>
    </div>
    @include('Index.Layouts.Header')
    @section('Content')
    @show
    <style type="text/css">
        .show{
            display: block !important;
        }
    </style>
    
    <div id="show-box-chat" style="position: fixed;width: 300px;height: 400px;background: green;right: 100px;bottom:30px;display: none;">
        <div  class="w-100" >
            <iframe
            allow="microphone;"
            width="350"
            height="430"
            src="https://console.dialogflow.com/api-client/demo/embedded/aec93893-d9b3-4247-ad89-2f1d5c91f2d9" style="border:0"></iframe>
        </div>

    

</div>
<div id="button-show-box" style="position: fixed;width: 50px;height: 50px;right: 30px;bottom:30px;cursor: pointer;">
    <i  class="fa fa-commenting tx" aria-hidden="true" style="font-size: 300%"></i>
</div>
<script>
    $(document).ready(function(){
      $("#button-show-box").click(function(){

        $("#show-box-chat").toggleClass("show");
    });
  });
</script>

</body>
<script
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('Index/js/side-bar.js')}}"></script>

</html>
