<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取当前用户的收藏信息
        //获取用户id
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        //获取wish表
        $info = DB::table('wish')->where('uid','=',$uid)->get();
        if(!$info){dd($info);}
        // dd($info);
        if(count($info)>0){
            foreach($info as $key=>$value){
                $good[$key] = DB::table('goods')->where('id','=',$value->gid)->first();
                //将wish表id存入
                $good[$key]->gid = $good[$key]->id;
                $good[$key]->id = $value->id;
            }
        }else{
           $good = ''; 
        }
        
        return view('Home.my.wishlist',['good'=>$good,'uid'=>$uid]);
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
    //添加到收藏夹
    public function show($id)
    {
        // echo 0;
        //获取用户id
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $sql = "select * from wish where uid={$uid} and gid={$id}";
        $count = count(DB::select($sql));
        // echo $count;
        if(count(DB::select($sql))>0){
            echo 1;
        }else{
            DB::table('wish')->insert(['uid'=>$uid,'gid'=>$id]);
            echo 0;
        }
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
        //获取用户id
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $sql = "delete from wish where uid={$uid} and gid={$id}";
        // dd($sql);
        if(DB::delete($sql)){
            return redirect('/mywish');
        }
    }
    public function del(Request $request){
        echo 1;
    }
}
