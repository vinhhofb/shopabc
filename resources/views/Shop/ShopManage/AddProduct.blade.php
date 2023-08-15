@extends("Shop.Layouts.Master")
@section('Title', 'Add Products')
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
                    <h4 class="mb-4">Add Products</h4>
                    <form action="{{url('kenh-cua-hang/quan-ly-cua-hang/them-san-pham')."/".$IdShop}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control"  placeholder="Products" name="name" required>
                          </div>
                        </div>
                        <div class="col-md-6 px-3">
                          <div class="form-group">
                            <label>Giá</label>
                            <input type="number" class="form-control"  placeholder="giá" name="price" required>
                          </div>
                        </div>
                        <div class="col-md-6 pr-1 pl-3">
                          <div class="form-group">
                            <label>Đơn vị</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="unit" required>
                              <option value="kg">kg</option>
                              <option value="cái">cái</option>
                              <option value="thùng">thùng</option>
                              <option value="Products">Products</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 pr-1 pl-3">
                          <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                              @foreach($GetCategory as $GetCategory)
                              <option value="{{$GetCategory->id}}">{{$GetCategory->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 px-3">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" placeholder="image" name="image" required>
                          </div>

                        </div>
                        <div class="col-12 px-3 mt-2">
                          <label>Content <span class="required"></span></label>
                          @if($errors->has('news_content'))
                          <small class="text-danger mt-1 float-right" style="font-size: 90%">
                            {{$errors->first('news_content')}}
                          </small>
                          @endif
                          <textarea class="mytextarea"  name="content" style="width: 100%;height: 300px" required>

                          </textarea>
                        </div>
                      </div>

                      <p>@if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                      @endif</p>

                      <button type="submit" class="btn btn-info btn-fill pull-right">Add Products</button>
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
  <script src="https://cdn.tiny.cloud/1/8omtusd7w8n579o9h492wd5a60hwebnhyzqf4e318yve94l5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script src="js/tinymce4x/vi_VN.js"></script>
  <script>
    tinymce.init({
      selector: '.mytextarea',
      height: 430,
      language: 'vi_VN',
      plugins: [
      'a11ychecker advcode advlist anchor autolink codesample fullscreen help image imagetools tinydrive',
      ' lists link media noneditable powerpaste preview',
      ' searchreplace table template visualblocks wordcount'
      ],
      toolbar:
      'undo redo | fontsizeselect | bold italic underline strikethrough| superscript subscript | hr | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent |  forecolor backcolor | link unlink anchor | image media insertfile',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      autosave_ask_before_unload: false,
      powerpaste_allow_local_images: true,
    });
  </script>
  @endsection










