<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getgoods($order){
        // dd($order);
        $o = [];
        foreach($order as $key=>$value){
            //1、订单id
            $o[$key]['id'] = $value->id;
            //2、订单号
            $o[$key]['order_num'] = $value->order_num;
            //3、总金额
            $o[$key]['total'] = $value->total;
            //4、订单状态
            $o[$key]['status'] = $value->status;
            //5、收货信息(obj)
            $o[$key]['address'] = DB::table('address')->where('id','=',$value->aid)->first();
            //6、商品信息
            //根据订单id获取订单详情信息
            $info = DB::table('order_info')->where('oid','=',$value->id)->get();
            $g = [];
            //遍历详情信息，并根据gid查询goods表信息
            foreach($info as $k=>$v){
                $goods = DB::table('goods')->where('id','=',$v->gid)->first();
                $g[$k]['gname'] = $goods->name;
                $g[$k]['gprice'] = $goods->price;
                $g[$k]['gpic'] = $goods->pic;
                $g[$k]['num'] = $v->num;
            }
            $o[$key]['goods'] = $g;            
        }
        return $o;
    }

    public function index(Request $request)
    {       
        //获取当前用户id
        $user = DB::table('users')->where('username','=',session('home'))->first();
        $uid = $user->id; 
        $user->pic = DB::table('user_info')->where('uid','=',$uid)->first()->pic;
        if($request->ajax()){

            //获取订单状态值
            $i = $request->input('i');
            if($i==5){
                // $sql ="select * from orders where uid={$uid}";
                $order = DB::table('orders')->where('uid','=',$uid)->get();
            }else{                
                // echo $i;
                $sql = "select * from orders where uid={$uid} and status={$i}";
                $order = DB::select($sql);
            }
            $orders = $this->getgoods($order);
            // echo $orders[0]['id'];
            return view('Home.my.status',['orders'=>$orders]);
        }else{
            //遍历订单
            $sql ="select * from orders where uid={$uid}";
            $order = DB::select($sql);
            $orders = $this->getgoods($order);
            //获取不同订单状态数量，用num数组的下标作为状态值
            $num= [0,0,0,0,0];
            foreach($orders as $v){
                $num[$v['status']]++;
            }
            // dd($num);
            return view('Home.my.index',['user'=>$user,'orders'=>$orders,'num'=>$num]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('username','=',session('home'))->first();
        $uid = $user->id; 
        $data = DB::table('orders')->where('id','=',$id)->get();
        $info = $this->getgoods($data);
        // dd($info);
        return view('Home.my.order',['info'=>$info[0],'uid'=>$uid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = DB::table('user_info')->where('uid','=',$id)->first();
        return view('Home.my.set',['info'=>$info]);
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
        $data = $request->except(['_token','_method']);

        //是否修改了头像
        if($request->hasFile('pic')){
            //删除原来的文件
            $pic = DB::table('user_info')->where('uid','=',$id)->first()->pic;
            unlink(Config::get('app.users').$pic);
            //初始化文件名
            $name = time()+rand(0,10000);
            //获取文件后缀
            $ext = $request->file('pic')->getClientOriginalExtension();
            //移动文件至指定位置/uploads/users/
            $request->file('pic')->move(Config::get('app.users'),$name.'.'.$ext);
            //将新文件名存入data
            $data['pic'] = $name.'.'.$ext;
        }else{
           unset($data['pic']); 
        }
        DB::table('user_info')->where('uid','=',$id)->update($data);
        return redirect('/myaccount/'.$id.'/edit');
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
