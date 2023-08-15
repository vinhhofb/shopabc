@extends("Admin.Layouts.Master")
@section('Title', 'Change Market')
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
                    <h4 class="mb-4">Change Market</h4>
                    <form action="{{url('admin/quan-ly-dia-diem/sua-cho')."/".$GetMarketById->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control"  placeholder="Chợ" value="{{$GetMarketById->name}}" name="name" required>
                          </div>
                        </div>
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"  placeholder="Address" name="address" value="{{$GetMarketById->address}}" required>
                          </div>
                        </div>
                        <div class="col-md-4 px-1 pl-3">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" placeholder="image" name="image">
                          </div>
                        </div>
                        <div class="col-md-2 px-1">
                         @if($GetMarketById->image !=null)
                         <img src="{{ asset("index/images/markets")."/".$GetMarketById->image}}" width="100%" height="100%">
                         @endif
                       </div>
                     </div>

                     <button type="submit" class="btn btn-info btn-fill pull-right">Change</button>
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
