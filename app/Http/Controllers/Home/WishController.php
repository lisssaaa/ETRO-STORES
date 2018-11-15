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
        foreach($info as $value){
            $good[] = DB::table('goods')->where('id','=',$value->gid)->first();
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
        // echo $id;
        //获取用户id
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $sql = "delete from wish where uid={$uid} and gid={$id}";
        // dd($sql);
        if(DB::delete($sql)){
            return redirect('/mywish');
        }
    }
}
