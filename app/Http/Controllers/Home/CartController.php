<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取用户id
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        //获取cart表信息
        $data = DB::table('cart')->where('uid','=',$uid)->get();
        if(count($data)>0){
            $cart= [];
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
        }else{
            $arr = '';
        }

        return view('Home.my.cart',['arr'=>$arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //购物车数量更新
    public function create(Request $request)
    {
        //获取id和num
        $id = $request->input('id');
        $num = $request->input('num');
        DB::table('cart')->where('id','=',$id)->update(['num'=>$num]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //收藏夹中添加购物车
    public function store(Request $request)
    {
        // dd($request->all());
        $gid = $request->input('gid');
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;        
        $sql = "select * from cart where uid={$uid} and gid={$gid}";
        $data = DB::select($sql);
        if($data){
            //商品已存在，数量加一
            $num = $data[0]->num+1;
            DB::table('cart')->where('id','=',$data[0]->id)->update(['num'=>$num]);               
        }else{
            //商品不存在，直接添加
            DB::table('cart')->insert(['gid'=>$gid,'uid'=>$uid,'num'=>1]); 
        }
        return redirect('/mywish');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品列表添加购物车
    public function show($id)
    {
        $gid = $id;
        
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;        
        $sql = "select * from cart where uid={$uid} and gid={$gid}";
        $data = DB::select($sql);
        if($data){
            //商品已存在，数量加一
            $num = $data[0]->num+1;
            DB::table('cart')->where('id','=',$data[0]->id)->update(['num'=>$num]);               
        }else{
            //商品不存在，直接添加
            DB::table('cart')->insert(['gid'=>$gid,'uid'=>$uid,'num'=>1]); 
        } 
        echo 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // echo $id;
        DB::table('cart')->where('id','=',$id)->delete();
        return redirect('/mycart');
    }

    //批量删除
    public function del(Request $request){
        echo 1;
        $ids = $request->input('ids');
        // echo $ids[0];
        // echo $ids;
        // $i = 0;
        // foreach($ids as $id){
        //     DB::table('type')->where('id','=',$id)->delete();      
        //     $i++;
        // }
        // echo '成功删除'.$i.'项数据';
    }
}
