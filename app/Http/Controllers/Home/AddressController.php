<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $addr = DB::table('address')->where('uid','=',$uid)->get();
        // dd($addr);
        if(count($addr)>0){            
            $def = DB::table('default_add')->where('uid','=',$uid)->get();
         
            if(count($addr) == 1 && count($def) == 0){
                //设置仅有的一条为默认
                DB::table('default_add')->insert(['uid'=>$addr[0]->uid,'aid'=>$addr[0]->id]);
            }
            //获取该用户默认address
            $default = DB::table('default_add')->where('uid','=',$uid)->first()->aid;            
        }else{
            $default = '';
        }

        return view('Home.my.address',['addr'=>$addr,'uid'=>$uid,'default'=>$default]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //城市级联
    public function city(Request $request){
        $list = DB::table('district')->where('upid','=',$request->input('upid'))->get();
        echo json_encode($list);
    }
    public function create()
    {
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        return view('Home.my.createaddr',['uid'=>$uid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->except('_token'));
        $data = $request->except('_token');
        DB::table('address')->insert($data);
        return redirect('/myaddress');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        DB::table('default_add')->where('uid','=',$uid)->update(['aid'=>$id]);
        return redirect('/myaddress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
        $addr = DB::table('address')->where('id','=',$id)->first();
        return view('Home.my.editaddr',['uid'=>$uid,'addr'=>$addr]);
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
        // var_dump($request->except(['_token','_method']));
        DB::table('address')->where('id','=',$id)->update($request->except(['_token','_method']));
        return redirect('/myaddress');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('address')->where('id','=',$id)->delete();
        //如果删除的是默认地址
        if(count(DB::table('default_add')->where('aid','=',$id)->first())!=0){
            DB::table('default_add')->where('aid','=',$id)->delete();
            //将第一条地址重新设为默认
            $uid = DB::table('users')->where('username','=',session('home'))->first()->id;
            $aid = DB::table('address')->where('uid','=',$uid)->get()[0]->id;
            DB::table('default_add')->insert(['aid'=>$aid,'uid'=>$uid]);
        }
        return redirect('/myaddress');
    }
}
