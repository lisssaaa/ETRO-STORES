<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($data){
        $order = [];
        foreach ($data as $key => $value) {
            //1、订单id
            $order[$key]['id'] = $value->id;
            //2、订单号
            $order[$key]['order_num'] = $value->order_num;
            //3、会员名
            $order[$key]['uid'] = $value->uid;
            $order[$key]['user'] = DB::table('users')->where('id','=',$value->uid)->first()->username;
            //4、收货地址
            $order[$key]['aid'] = $value->aid;
            $order[$key]['address'] = DB::table('address')->where('id','=',$value->aid)->first();
            //5、订单总额
            $order[$key]['total'] = $value->total;
            //6、订单状态
            $order[$key]['status'] = $value->status;
        }
        // dd($order);
        return $order;
    }
    public function index(Request $request)
    {
        $k=$request->input('keywords');
        //ajax分页
        //获取所有分页 数据总条数
        $total = DB::table('orders')->count();
        //每页显示条数
        $num = 5;
        //获取最大页
        $maxpage = ceil($total/$num);
        // dd($maxpage);
        //遍历存储到数组中
        for($i=0;$i<$maxpage;$i++){
            $p[$i] = $i+1;
        }
        //获取传递页码参数
        $page = $request->input('page');
        //初始化页码
        if(empty($page)){
            $page = 1;
        }
        //select * from order limit $offset,$num:偏移量=（当前页码-1）*每页显示条数
        $offset =($page-1)*$num;
        
        $sql ="select * from orders limit {$offset},{$num}";
        $sql1 ="select * from orders where order_num={$k}";
        if($k){
            $data = DB::select($sql1);
            // dd($data);
            $order = $this->get($data);
        }else{
            $data = DB::select($sql);           
            $order = $this->get($data);
            // dd($data);
        }        
        //判断是否为ajax请求
        if($request->ajax()){
            // echo $order[0]['user'];
            //加载模板并分配数据
            return view('Admin.order.page',['order'=>$order]);
        }
        // dd($order);
        return view('Admin.order.index',['p'=>$p,'order'=>$order,'k'=>$k]);
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
    //获取订单详情
    public function show($id)
    {
        $info = DB::table('order_info')->where('oid','=',$id)->get();
        foreach ($info as $key => $value) {
            $goods = DB::table('goods')->where('id','=',$value->gid)->first();
            foreach ($goods as $k => $v) {
                $info[$key]->$k = $v;
            }            
        }
        echo json_encode($info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //获取要修改为的状态
        $status = $request->input('status');
        DB::table('orders')->where('id','=',$id)->update(['status'=>$status]);
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

    // //修改订单状态
    // public function status(Request $request){
    //     echo 1;
    //     // echo $request->input('i');
    // }
}
