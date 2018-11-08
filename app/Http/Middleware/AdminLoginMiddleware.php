<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('admin')){
            //获取访问控制器的方法
            /************************************/
            //获取访问模块方法名
            $action=$request->route()->getActionMethod();
            //获取访问模块控制器的名字
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            //控制器名字
            $controller=$func[0];
            $actionName=$func[1];
            // echo $controller.":".$action;
            /************************************/
            //4.权限对比
            $nodelist = session('nodelist');//二维数组
            if(empty($nodelist[$controller]) || !in_array($actionName,$nodelist[$controller])){
                return redirect("/admin")->with('error',"抱歉,您没有权限访问该模块,请联系超级管理员");
            }
            return $next($request);
        }else{
            return redirect('/adminlogin');
        }
        
    }
}
