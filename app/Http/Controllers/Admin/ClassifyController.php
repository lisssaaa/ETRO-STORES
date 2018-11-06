<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB
use DB;
class ClassifyController extends Controller
{
    /**
     *
     获取分类
     *
     */
    public function getcates(){
        $cate=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历
        foreach($cate as $key=>$value){
        // echo $value->path."<br>";
        //转换为数组
        $arr=explode(",",$value->path);
        // echo "<pre>";
        // var_dump($arr);
        //获取逗号个数
        $len=count($arr)-1;
        //字符串重复函数
        $cate[$key]->name=str_repeat("--|",$len).$value->name;
        } 
        return $cate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//         $data=DB::select("select *,concat(path,'',id) as paths from type order by
// paths");
//         dd($data);
        $cate=DB::table("type")->select(DB::raw('*,concat(path,"",id) as paths'))->orderBy('paths')->paginate(6);
        // dd($cate);
        return view('Admin.classify',['cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cate = $this->getcates();
        // dd($cate);
        return view('Admin.classifyadd',['cate'=>$cate]);
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
