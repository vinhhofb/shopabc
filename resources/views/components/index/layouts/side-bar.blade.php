<style type="text/css">
    .treemenu [level] {
      transition: max-height 0.3s ease-out;
      overflow: hidden;
  }

  .treemenu [level].closed {
      max-height: 0;
  }

  .treemenu [level].opened {
      max-height: 50px;
  }

  .treemenu [level="1"] .lbl {
      padding-left: 15px;
  }

  .treemenu [level="2"] .lbl {
      padding-left: 100px;
  }
  .treemenu > [level] {

      cursor: pointer;
  }

  .treemenu > [level].opened {
      margin: 1px;
  }

  .treemenu > [level]:hover {
       background: #e9f6ff;
  }

  .treemenu .lbl {
      padding: 5px;
      display: inline-block;
  }

  .title {
      text-align: center;
      font-size: 30px;
      margin: 10px;

  }
  span.lbl{
    font-size: 85%;
    color: black;
}
@media only screen and (max-width: 1000px) {
  .side-bar-mb{
    margin-top: 25px !important;
  }
@media only screen and (max-width: 1000px) {
  .button-header-mb{
    display: block !important;
    display: flex;
  }
</style>
<div class="p-2 side-bar-mb" style="width: 210px;height: calc(100vh - 50px);position: fixed;background: white;">
  <div class="button-header-mb d-none mb-3">
    @if(isset(Auth::user()->id))
    <a href="{{url('don-hang')}}">
    <button class="btn bg text-white mr-2" style="font-size: 90%">Đơn hàng</button>
    </a>
    @else
    <a href="{{url('dang-nhap')}}">
    <button class="btn bg text-white mr-2" style="font-size: 90%">Đăng nhập</button>
    </a>
    @endif
    <a href="{{url('gio-hang')}}">
    <button class="btn bg text-white" style="font-size: 90%">Giỏ hàng</button>
     </a>
  </div>
    <span class="font-weight-bold mb-0 tx">DANH MỤC</span>
    <hr style="margin-top:5px">
    <div class="treemenu hide-scroll" style="overflow-y: scroll;height:calc(100vh - 120px);margin-top: -18px;">
        @foreach($getCategoryLevel0 as $item1)
        <div id="cha-{{$item1->id}}" style="margin-top: 10px" level="{{$item1->level}}"> <span class="lbl font-weight-bold" style="text-transform: uppercase;">{{$item1->name}}</span></div>
        @foreach($getCategoryLevel1 as $item2)
        @if($item2->parent_id == $item1->id)
        <div id="con-{{$item1->id}}" level="{{$item2->level}}"> <span class="lbl"><a href="{{url('danh-muc')."/".$item2->id}}" style="color: black !important"> {{$item2->name}}</a> </span></div>
        @endif
        @endforeach
        @endforeach
    </div>


</div>
