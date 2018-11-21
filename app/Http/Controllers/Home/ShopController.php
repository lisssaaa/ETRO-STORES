<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getcates($pid){
        $cate = [];
        $s = DB::table('type')->where('pid','=',$pid)->get();
        foreach($s as $key=>$value){
            $value->dev = $this->getcates($value->id);
            $cate[]=$value;
        }
        return $cate;
    }
    public function index(Request $request)
    {
        //获取品牌信息
        $brand = DB::table('brand')->get();
        //获取分类信息
        $cate = $this->getcates(0);
        // dd($cate);
        $bid = $request->input('brand');
        $cid = $request->input('cate');
        $max = $request->input('max');
        $min = $request->input('min');
        $price = $request->input('price');
        if($request->ajax()){
            if($bid){
                // echo $bid;
                $goods = DB::table('goods')->where('b_id','=',$bid)->get();
            }else if($max&&$min){
                if($cid){
                    $sql = "select * from goods where typeid={$cid} and price between {$min} and {$max}";
                    $goods = DB::select($sql);
                }else{
                    // echo $max;
                    $goods = DB::table('goods')->whereBetween('price',[$min,$max])->get();
                }                                
            }else if($price){
                $goods = DB::table('goods')->orderBy('price',$price)->get();
            }else{
                echo 1;
            }
            return view('Home.shop.page',['goods'=>$goods]);  
        }else if($cid){
            if($min&&$max){
                $sql = "select * from goods where typeid={$cid} and price between {$min} and {$max}";
                $goods = DB::select($sql);
            }else{
                $goods = DB::table('goods')->where('typeid','=',$cid)->get();
                return view('Home.shop.index',['brand'=>$brand,'cate'=>$cate,'goods'=>$goods]);
            }
            
        }else{
            //获取所有商品信息
            $goods = DB::table('goods')->get();
            return view('Home.shop.index',['brand'=>$brand,'cate'=>$cate,'goods'=>$goods]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //全部结算
    public function create()
    {
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $address = DB::table('address')->where('uid','=',$uid)->get();
        $default = DB::table('default_add')->where('uid','=',$uid)->first()->aid;
        // dd($address);
        if(count(DB::table('cart')->where('uid','=',$uid)->get())>0){
           //获取cart表信息
            $data = DB::table('cart')->where('uid','=',$uid)->get();
            foreach($data as $key=>$value){
                $cart = DB::table('goods')->where('id','=',$value->gid)->first();
                //将商品信息存入数组
                foreach($cart as $k=>$v){
                    $arr[$key][$k] = $v;                
                }
                //将购物车该商品的数量存入arr            
                $arr[$key]['num'] = $value->num;
                $arr[$key]['gid'] = $arr[$key]['id'];            
                $arr[$key]['id'] = $value->id;       
            }
            // dd($arr);
            return view('Home.shop.checkout',['address'=>$address,'default'=>$default,'cart'=>$arr]); 
        }else{
            echo'<script>alert("您的购物车没有需要结算的商品！");location="/shop"</script>';
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行结算
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $cid = $request->input('cid');
        unset($data['cid']);
        $data['uid'] = $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $data['order_num'] = rand(0,100000000);
        $data['status'] = 0;
        //添加订单，并获取订单id
        $oid = DB::table('orders')->insertGetId($data);
        //添加订单详情
        $info['oid'] = $oid;
        foreach($cid as $value){
            $cart = DB::table('cart')->where('id','=',$value)->first();
            $info['gid'] = $cart->gid;
            $info['num'] = $cart->num;
            // dd($info);
            //逐条加入order_info表
            DB::table('order_info')->insert($info);
            //从购物车删除
            DB::table('cart')->where('id','=',$value)->delete();
        }
        return redirect('/myaccount/'.$oid);
    }
    //付款
    public function orderpay(Request $request){
        // dd($request->input('oid'));
        $oid = $request->input('oid');
        $data['oid'] = $oid;
        $data['order_num'] = DB::table('orders')->where('id','=',$oid)->first()->order_num;
        $data['total'] = DB::table('orders')->where('id','=',$oid)->first()->total;
        // dd($data);
        pay($data);

    }
    public function returnurl($data){
        //修改订单状态
        // echo $data;
        DB::table('orders')->where('id','=',$data)->update(['status'=>1]);
        return view('Home.shop.return',['oid'=>$data]);
    }

    //确认收货
    public function confirm($oid){
        // echo $oid;
        //修改订单状态为待评价
        DB::table('orders')->where('id','=',$oid)->update(['status'=>3]);
        return redirect('/myaccount/'.$oid);
    }
    //评价订单
    public function comment(){
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo '商品id：'.$id;
        $good = DB::table('goods')->where('id','=',$id)->first();
        // dd($good);
        
        if(count(DB::table('comment')->where('gid','=',$id)->get())>0){
            //获取商品评价
            $comment = DB::table('comment')->where('gid','=',$id)->get();
            foreach($comment as $key=>$value){
                $comment[$key]->user = DB::table('users')->where('id','=',$value->uid)->first()->username;
                $comment[$key]->upic = DB::table('user_info')->where('uid','=',$value->uid)->first()->pic;
            }  
        }else{
           $comment ='';
        }
       
        // dd($comment);
        return view('Home.shop.simple',['good'=>$good,'comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //取消订单
    public function edit($id)
    {
        // echo $id;
        //删除订单
        DB::table('orders')->where('id','=',$id)->delete();
        //删除订单详情
        DB::table('order_info')->where('oid','=',$id)->delete();
        echo 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
