<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Login;   //登陆
use Illuminate\Support\Facades\Validator; //验证器
class LoginController extends Controller{

    //登陆页面
    public function login(){
        return view('index.login');
    }

    // 执行登陆
    public function add(){
        $_token = request()->except('_token');
        $l_name = $_token['l_name'];
        $l_pwd = md5($_token['l_pwd']);
        // 给一个where数组光接收用户名
        $where = [
            ['l_name','=',$l_name],
            ['l_pwd','=',$l_pwd]
        ];
        // 查询数据库
        $admin = Login::where($where)->first();
        if($admin==false){
            //  return redirect('/')->with('erro','账号或密码有误');die;
            echo "<script>alert('账号或密码有误');location.href='/'</script>";die;
        }
        if($admin){
            // 存入session
            session(['loginInfo'=>$admin]);
            request()->session()->save();
            echo "<script>alert('登陆成功');location.href='/index/index'</script>";
        }else{
            // return redirect('Login/index')->with('erro','登陆失败');
            echo "<script>alert('登陆失败');location.href='/'</script>";
        }
    }

    // 注册页面
    public function sign(){
        return view('index.sign');
    }

    // 执行注册
    public function signAdd(){
        //接收值
        $l_name=request()->post('l_name');   //用户名
        $l_pwd=request()->post('l_pwd');     //密码
        $l_pwds=request()->post('l_pwds');   //确认密码
        // 判断
        if(empty($l_name)){
            echo "<script>alert('用户名不能为空');location.href='/login/sign'</script>";die;
        }else if(empty($l_pwd)){
            echo "<script>alert('密码不能为空');location.href='/login/sign'</script>";die;
        }else if($l_pwd!==$l_pwds){
            echo "<script>alert('密码不一致');location.href='/login/sign'</script>";die;
        }
        // 唯一性
        $name = Login::where('l_name',$l_name)->first();
        if($name){
            echo "<script>alert('用户名重复，请重新输入');location.href='/login/sign'</script>";die;
            // return redirect('login.index');
        }
        // md5加密
        $l_pwd = md5($l_pwd);
        if(!empty($l_pwd)){
            $l_pwd=$l_pwd;
        }
        // 数据
        $post = [
            'l_name'=>$l_name,
            'l_pwd'=>$l_pwd
        ];
        // 添加到数据库
        $ins = Login::insert($post);
        //判断是否添加到数据库
        if($ins){
            echo "<script>alert('注册成功....');location.href='/'</script>";
            // return redirect('login.index');
        }
    }

    // 登陆退出
    function logout(){
        // 清除session
        session(['loginInfo'=>null]);
        request()->session()->save();
        echo "<script>alert('退出成功');location.href='/'</script>";
        // return view('admin/login/login');
    }
}
