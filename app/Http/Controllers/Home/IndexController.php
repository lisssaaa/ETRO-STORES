<?php

namespace App\Http\Controllers\Home;
//引入view类
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //向公共模板传输变量
    public function getpublic(View $view){
        if(session('home')){
            $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
            
            $u['pic'] = DB::table('user_info')->where('uid','=',$uid)->first()->pic;
            $u['uid'] = $uid;
            //获取cart表信息
            $data = DB::table('cart')->where('uid','=',$uid)->get();
            // dd(count($data));
            if(count($data)>0){
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
                $u['goods'] = $arr;
                $u['count'] = count($data);
            }else{
                $u['goods'] = 0;
                $u['count'] = 0;
            }          
            $u['total'] = 0;
            $view->with('u',$u);
        }
    }
    //递归获取分类
    public function getcates($pid){
        $cate = [];
        $s = DB::table('type')->where('pid','=',$pid)->get();
        foreach($s as $key=>$value){
            $value->dev = $this->getcates($value->id);
            $cate[]=$value;
        }
        return $cate;
    }
    public function index()
    {
        //获取分类信息
        $cate = $this->getcates(0);
        // dd($cate);
        return view('Home.index',['cate'=>$cate]);
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
        //
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
        //
    }
}
