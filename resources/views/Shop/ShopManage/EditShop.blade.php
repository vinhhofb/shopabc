@extends("Shop.Layouts.Master")
@section('Title', 'Sửa cửa hàng')
@section('Content')
<div class="container-scroller">
  <x-shop.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-shop.layouts.side-bar/>
    </div>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                <div>
                  <div class="bg-white p-4">
                    <h4 class="mb-4">Sửa cửa hàng</h4>
                    <form action="{{url('kenh-cua-hang/quan-ly-cua-hang/sua-cua-hang')."/".$GetShopById->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Tên cửa hàng</label>
                            <input type="text" class="form-control"  placeholder="cửa hàng" name="title" value="{{$GetShopById->name}}" required>
                          </div>
                        </div>
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Nội dung mô tả</label>
                            <input type="text" class="form-control"  placeholder="cửa hàng" name="content" required value="{{$GetShopById->content}}">
                          </div>
                        </div>

                        <div class="col-md-6 px-3">
                          <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" placeholder="image" name="image">
                          </div>
                          <img src="{{ asset("index/images/shops")."/".$GetShopById->image}}" width="60px" height="60px">
                        </div>

                      </div>
                      <p>@if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                      @endif</p>

                      <button type="submit" class="btn btn-info btn-fill pull-right">Sửa cửa hàng</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#addresslv1").change(function() {
        var idAddresslv1 = $(this).val();
        $.get("{{url('lay-cho')}}"+"/"+idAddresslv1,function(data){
          $("#addresslv2").html(data);
          console.log(data)
        });
      });

    });
  </script>
  @endsection






















