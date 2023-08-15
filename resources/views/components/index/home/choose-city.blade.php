<div style="width: 100%;height:100vh;background: #00000054;position: fixed;z-index: 999999;">
    <div class="pt-3" style="width: 80%;height: calc(100vh - 80px);background: white;margin: auto;margin-top: 50px;overflow-y: scroll;">
        <span class="ml-3 font-weight-bold">Choose your province</span>
        <hr/>
        <div class="row m-0 mt-3 px-3" style="">
            @foreach($GetCitys as $GetCity)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-1">
                <a href="{{url("chon-thanh-pho")."/".$GetCity->id}}">
                    <div style="width: 100%; height: 80px; position: relative">
                        @if($GetCity->image !="")
                        <img src="{{ asset("Index/images/citys")."/".$GetCity->image}}" width="100%" height="100%" style="objectFit: cover; borderRadius: 5px" />
                        @else
                        <img src="{{ asset("Index/images/citys/default.png")}}" width="100%" height="100%" style="objectFit: cover; borderRadius: 5px" />
                        @endif
                        <div style="width: 100%; height: 100%; position: absolute; background: black; top: 0; borderRadius: 5px; opacity: 0.2 ">
                        </div>
                        <p class="text-white ml-2 font-weight-bold" style="position: absolute; top: 65%">{{$GetCity->name}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>