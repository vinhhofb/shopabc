@extends("Admin.Layouts.Master")
@section('Title', 'Change tỉnh thành')
@section('Content')
<div class="container-scroller">
  <x-admin.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-admin.layouts.side-bar/>
    </div>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                <div>
                  <div class="bg-white p-4">
                    <h4 class="mb-4">Change tỉnh thành</h4>
                    <form action="{{url('admin/quan-ly-dia-diem/sua-thanh-pho')."/".$GetCityById->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Tên thành phố</label>
                            <input type="text" class="form-control"  placeholder="Thành phố" value="{{$GetCityById->name}}" name="name" required>
                          </div>
                        </div>
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" placeholder="image" name="image">
                          </div>
                        </div>
                        <div class="col-md-2 px-1">
                         @if($GetCityById->image !=null)
                         <img src="{{ asset("index/images/citys")."/".$GetCityById->image}}" width="100%" height="100%">
                         @endif
                       </div>
                     </div>

                     <button type="submit" class="btn btn-info btn-fill pull-right">Sửa</button>
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
 @endsection




