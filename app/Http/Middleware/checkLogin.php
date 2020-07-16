<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
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
         // 防非发登陆
         $user = session('loginInfo');
         if(!$user){
            echo "<script>alert('请先登陆');location.href='/'</script>";die;
            //  return redirect('/');
         }
        return $next($request);
    }
}
