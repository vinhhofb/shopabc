@extends("Shop.Layouts.Master")
@section('Title', 'Product List')
@section('Content')
<style type="text/css">
  @media only screen and (max-width: 900px) {
    td{
      white-space: nowrap;
    }
  }
</style>
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
                  <div>
                    
                     <div class="bg-white">

                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                           <p class="font-weight-bold float-left" style="font-size:120%">Product List</p>
                           <div class="float-right"> 
                             <div class="d-flex">
                               <a class="mr-2" href="{{url('kenh-cua-hang/quan-ly-cua-hang/them-san-pham')."/".$IdShop}}">
                                <div class="btn btn-success">Add store</div>
                              </a>
                              
                            </div> 
                          </div>
                          <div style="clear: both;"></div>

                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>
                                    Code
                                  </th>
                                  <th width="300px">
                                    Product Name
                                  </th>
                                  <th>
                                    Image
                                  </th>
                                  <th>
                                    Information
                                  </th>
                                  <th>
                                    Status
                                  </th>
                                  <th>
                                    Method
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($GetProductByShops as $GetProductByShop)
                                <tr>
                                  <td class="py-1">
                                    #{{$GetProductByShop->id}}
                                  </td>
                                  <td width="300px">
                                    <p>{{$GetProductByShop->name}}</p>
                                  </td>
                                  <td>
                                    @if($GetProductByShop->image)
                                    <img src="{{ asset("index/images/products")."/".$GetProductByShop->image}}" width="80px" height="50px">
                                    @else
                                    <img src="{{ asset("images/default.png")}}" width="80px" height="50px">
                                    @endif
                                  </td>
                                  <td width="20%">
                                    <p>{{number_format($GetProductByShop->price)}}$ / {{$GetProductByShop->unit}}</p>
                                    <p class="mt-2">Quantity: {{$GetProductByShop->quanlity}}</p>
                                    <p class="mt-2">Selled: {{$GetProductByShop->count_sale}}</p>
                                    
                                  </td>
                                  <td width="15%">
                                    @if($GetProductByShop->active == 1)
                                    <p class="text-success">Active</p>
                                    @elseif($GetProductByShop->active == 0)
                                    <p class="text-danger">Sold</p>
                                    @endif
                                  </td>
                                  <td>                                                                 
                                    @if($GetProductByShop->active == 1)
                                    <div class="btn btn-danger" data-toggle="modal" data-target="#exampleModalBlock{{$GetProductByShop->id}}">Sold</div>
                                    @elseif($GetProductByShop->active == 0)
                                    <div class="btn btn-success" data-toggle="modal" data-target="#exampleModalUnLock{{$GetProductByShop->id}}">Show</div>
                                    @endif 
                                    <a href="">
                                      <div class="btn btn-primary mt-2">DIscount</div>   
                                    </a>
                                  </td>
                                </tr>
                                <div class="modal fade" id="exampleModalBlock{{$GetProductByShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sold Products {{$GetProductByShop->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>When you run out Products "{{$GetProductByShop->name}}", "{{$GetProductByShop->name}}" will be hidden from the homepage until you reopen it.</p>
                                      </div>
                                      <div class="p-2">
                                       <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                       <a  href="{{url('kenh-cua-hang/quan-ly-cua-hang/khoa-mo-san-pham')."/".$GetProductByShop->id}}">
                                        <button type="button" class="btn btn-danger float-right mr-2">
                                          OK                 
                                        </button>
                                      </a>


                                      <div style="clear: both"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="modal fade" id="exampleModalUnLock{{$GetProductByShop->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Availability change</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                     <p>When you open the available status Products {{$GetProductByShop->name}}, {{$GetProductByShop->name}} Will show back at home page.</p>
                                   </div>
                                   <div class="p-2">
                                     <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                     <a  href="{{url('kenh-cua-hang/quan-ly-cua-hang/khoa-mo-san-pham')."/".$GetProductByShop->id}}">
                                      <button type="button" class="btn btn-success float-right mr-2">
                                       OK                  
                                     </button>
                                   </a>
                                   <div style="clear: both"></div>
                                 </div>
                               </div>
                             </div>
                           </div>
                           @endforeach
                         </tbody>
                       </table>
                     </div>
                   </div>
                 </div>
               </div>

             </div>
           
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


