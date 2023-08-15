@extends("Admin.Layouts.Master")
@section('Title', 'Edit Category')
@section('Content')
<div class="container-scroller">
  <x-admin.layouts.header-dashboard/>
  <div class="container-fluid page-body-wrapper">
    <div class="theme-setting-wrapper">
    </div>
    <div class="side-bar-box" style="width: 250px;">
      <x-admin.layouts.side-bar/>
    </div>
    <div class="main-panel p-0">
      <div class="content-wrapper p-0">
        <div class="row m-0">
          <div class="col-md-12 grid-margin p-0">
            <div class="row m-0">
              <div class="col-12 col-xl-12 mb-4 mb-xl-0 p-0">
                <div>
                  <div class="bg-white p-4">
                    <h4 class="mb-4">Edit Category</h4>
                    <form action="{{url('admin/quan-ly-danh-muc/sua-danh-muc')."/".$Category->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control"   value="{{$Category->name}}" name="name" required>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-info btn-fill pull-right">Edit Category</button>
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
























  