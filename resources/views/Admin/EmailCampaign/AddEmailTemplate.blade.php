@extends("Admin.Layouts.Master")
@section('Title', 'Add email template')
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
                    <h4 class="mb-4">Add email template</h4>
                    <form method="post" action="{{url('admin/chien-dich-email/mau-email/them')}}">
                      @csrf
                      <div class="row m-0">
                        <div class="col-12 p-0 mb-4">
                          <label class="fz95">Title</label>

                          <input type="text" name="template_title" class="form-control mr-2" required>
                          <p class="mt-1 mb-0">Notes: insert <span class="text-warning">%User%</span> Enter the content so that the System automatically changes the appropriate Name when sending mail to many people</p>
                        </div>
                        <div class="col-12 p-0 mb-2">
                          <label class="fz95">Content</label>
                          <textarea class="mytextarea"  name="template_content"  style="width: 100%;height: 300px">
                           
                          </textarea>
                          <p class="mt-1 mb-0 " >Notes: insert <span class="text-warning">%User%</span> Enter the content so that the System automatically changes the appropriate Name when sending mail to many people</p>
                        </div>
                        <div class="col-12 p-0 pr-2 mb-2 text-center mt-3">
                          <button class="btn bg text-white">Add</button>
                        </div>
                      </div>
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
  <script src="https://cdn.tiny.cloud/1/8omtusd7w8n579o9h492wd5a60hwebnhyzqf4e318yve94l5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script src="js/tinymce4x/vi_VN.js"></script>
  <script>
    tinymce.init({
      selector: '.mytextarea',
      height: 600,
      plugins: [
      'a11ychecker advcode advlist anchor autolink codesample fullscreen help image tinydrive',
      ' lists link media noneditable powerpaste preview',
      ' searchreplace table template visualblocks wordcount'
      ],
      toolbar:
      'undo redo | fontsizeselect | bold italic underline strikethrough| superscript subscript | hr | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent |  forecolor backcolor | link unlink anchor | responsivefilemanager',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      autosave_ask_before_unload: false,
      powerpaste_allow_local_images: true,
      image_advtab: true,
      relative_urls: false,
      external_filemanager_path:"{{url('/responsive_filemanager/filemanager')}}/",
      filemanager_title:"File đã tải" ,
      external_plugins: { "responsivefilemanager" : "{{url('/responsive_filemanager/tinymce/plugins/responsivefilemanager/plugin.min.js')}}"}
    });
  </script>

  @endsection








