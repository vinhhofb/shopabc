<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class CategoryController extends Controller
{   

    public function ProductsLoadMoreRelate(Request $request){
        if(isset(Auth::user()->id)){
            //get products relate by keyword search of user
            $RelateKeywordList = array();
            $RelateKeywordQuery = DB::table('relate')->where('relate.type',0)->where('relate.user_id',Auth::user()->id)->orderBy('relate.id','desc')->skip(0)->take(4)->get();

            for ($i = 0; $i < count($RelateKeywordQuery); $i++) {
                $GetProductRelatesKeyword= DB::table('products')
                ->leftJoin('category','products.id_category','category.id')
                ->leftJoin('shop','shop.id','products.id_shop')
                ->leftJoin('market','market.id','shop.id_market')
                ->leftJoin('city','city.id','market.id_city')
                ->select('products.id','products.slug','products.image','products.name','products.count_sale','products.price')
                ->where('products.active','=',1)
                ->where('products.name', 'like', '%' . $RelateKeywordQuery[$i]->param. '%');
                
                if(Session::get('id_city') != null){
                    $GetProductRelatesKeyword->where('city.id', '=', Session::get('id_city'));
                }
                if(Session::get('id_market') != null && Session::get('id_market') !=0){
                    $GetProductRelatesKeyword->where('market.id', '=', Session::get('id_market'));
                }
                $GetProductRelatesKeyword=$GetProductRelatesKeyword
                ->inRandomOrder()
                ->skip(0)
                ->take(60)
                ->get();
                for ($j = 0; $j < count($GetProductRelatesKeyword); $j++) {
                    array_push($RelateKeywordList, [
                        'id' => $GetProductRelatesKeyword[$j]->id,
                        'slug' => $GetProductRelatesKeyword[$j]->slug,
                        'price' => $GetProductRelatesKeyword[$j]->price,
                        'image' => $GetProductRelatesKeyword[$j]->image,
                        'name' => $GetProductRelatesKeyword[$j]->name,
                        'count_sale' => $GetProductRelatesKeyword[$j]->count_sale,
                    ]);

                }
            }
            $list1 = collect($RelateKeywordList);
            $list1 = $list1->shuffle();
            $list1 = $list1->all();


            //get products relate by category choose of user
            $RelateCategoryList = array();
            $RelateCategoryQuery = DB::table('relate')->where('relate.type',1)->where('relate.user_id',Auth::user()->id)->orderBy('relate.id','desc')->skip(0)->take(4)->get();

            for ($i = 0; $i < count($RelateCategoryQuery); $i++) {
                $GetProductRelatesCategory= DB::table('products')
                ->leftJoin('category','products.id_category','category.id')
                ->leftJoin('shop','shop.id','products.id_shop')
                ->leftJoin('market','market.id','shop.id_market')
                ->leftJoin('city','city.id','market.id_city')
                ->select('products.id','products.slug','products.image','products.name','products.count_sale','products.price')
                ->where('products.active','=',1)
                ->where('category.id', '=',$RelateCategoryQuery[$i]->param)
                ->inRandomOrder();
                
                if(Session::get('id_city') != null){
                    $GetProductRelatesCategory->where('city.id', '=', Session::get('id_city'));
                }
                if(Session::get('id_market') != null && Session::get('id_market') !=0){
                    $GetProductRelatesCategory->where('market.id', '=', Session::get('id_market'));
                }
                $GetProductRelatesCategory=$GetProductRelatesCategory->skip(0)->take(60)->get();
                for ($j = 0; $j < count($GetProductRelatesCategory); $j++) {
                    array_push($RelateCategoryList, [
                        'id' => $GetProductRelatesCategory[$j]->id,
                        'slug' => $GetProductRelatesCategory[$j]->slug,
                        'price' => $GetProductRelatesCategory[$j]->price,
                        'image' => $GetProductRelatesCategory[$j]->image,
                        'name' => $GetProductRelatesCategory[$j]->name,
                        'count_sale' => $GetProductRelatesCategory[$j]->count_sale,
                    ]);

                }
            }
            $list2 = collect($RelateCategoryList);
            $list2 = $list2->shuffle();
            $list2 = $list2->all();


            //get products relate by products trafic of user
            $RelateTrafficList = array();
            $RelateTrafficQuery = DB::table('trafic_history')->where('trafic_history.user_id',Auth::user()->id)->orderBy('trafic_history.id','desc')->skip(0)->take(3)->get();

            for ($i = 0; $i < count($RelateTrafficQuery); $i++) {
                $GetProductRelatesTraffic= DB::table('products')
                ->leftJoin('category','products.id_category','category.id')
                ->leftJoin('shop','shop.id','products.id_shop')
                ->leftJoin('market','market.id','shop.id_market')
                ->leftJoin('city','city.id','market.id_city')
                ->select('products.id','products.slug','products.image','products.name','products.count_sale','products.price')
                ->where('products.active','=',1)
                ->where('category.id', '=',$RelateTrafficQuery[$i]->category_id)
                ->inRandomOrder();
                if(Session::get('id_city') != null){
                    $GetProductRelatesTraffic->where('city.id', '=', Session::get('id_city'));
                }
                if(Session::get('id_market') != null && Session::get('id_market') !=0){
                    $GetProductRelatesTraffic->where('market.id', '=', Session::get('id_market'));
                }
                $GetProductRelatesTraffic=$GetProductRelatesTraffic->skip(0)->take(60)
                ->get();
                for ($j = 0; $j < count($GetProductRelatesTraffic); $j++) {
                    array_push($RelateTrafficList, [
                        'id' => $GetProductRelatesTraffic[$j]->id,
                        'slug' => $GetProductRelatesTraffic[$j]->slug,
                        'price' => $GetProductRelatesTraffic[$j]->price,
                        'image' => $GetProductRelatesTraffic[$j]->image,
                        'name' => $GetProductRelatesTraffic[$j]->name,
                        'count_sale' => $GetProductRelatesTraffic[$j]->count_sale,
                    ]);

                }
            }
            $list3 = collect($RelateTrafficList);
            $list3 = $list3->shuffle();
            $list3 = $list3->all();
            


            $arr_list = collect(array_merge($list1, $list2, $list3));
            $arr_list = $arr_list->shuffle();
            $arr_list = $arr_list->all();

            $arr_list = collect($arr_list);
            $GetProductRelates = new \Illuminate\Pagination\LengthAwarePaginator(
                $arr_list->forPage($request->page, 20),
                $arr_list->count(),
                16,
                $request->page,
                ['path' => url('xem-them'), 'pageName' => "page"]
            );
        }else{
            $GetProductRelatesQuery = DB::table('products')
            ->leftJoin('category','products.id_category','category.id')
            ->leftJoin('shop','shop.id','products.id_shop')
            ->leftJoin('market','market.id','shop.id_market')
            ->leftJoin('city','city.id','market.id_city')
            ->select('products.id','products.slug','products.image','products.name','products.count_sale','products.price')
            ->where('products.active','=',1);
            


            if(Session::get('id_city') != null){
                $GetProductRelatesQuery->where('city.id', '=', Session::get('id_city'));
            }
            if(Session::get('id_market') != null && Session::get('id_market') !=0){
                $GetProductRelatesQuery->where('market.id', '=', Session::get('id_market'));
            }
            $GetProductRelates=$GetProductRelatesQuery->inRandomOrder()->paginate(20);
        }


        

        
        $view = view('Index.Home.LoadMoreProducts',compact('GetProductRelates'))->render();
        return response()->json(['html'=>$view]);

        
    }
    public function ProductsCategory($id){

        if(isset(Auth::user()->id)){
            DB::table('relate')->insert(['type'=>1,'param'=>$id,'user_id'=>Auth::user()->id,'created_at'=>time()]);
        }

        $categoryProductQuery = DB::table('products')
        ->leftJoin('shop','shop.id','products.id_shop')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->select('products.id','products.slug','products.image','products.name','products.count_sale','products.price')
        ->where('products.id_category', '=', $id)
        ->orderBy('products.id','desc');

        if(Session::get('id_city') != null){
            $categoryProductQuery->where('city.id', '=', Session::get('id_city'));
        }
        $categoryProduct=$categoryProductQuery->inRandomOrder()->paginate(40);
        
        return view('Index.Category.Index',['categoryProduct'=>$categoryProduct]);
    }

}
