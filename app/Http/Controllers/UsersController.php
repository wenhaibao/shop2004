<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    /**
     * 注册视图
     */
    public function regist(){
        return view('users.regist');
    }
    /**
     * 注册执行
     */
    public function registdo(){
        $data = request()->all();
        $UsersModel = new UsersModel();
        $data['password'] = md5($data['password']);
        $res = $UsersModel->insert($data);
        if($res){
            return redirect('login');
        }
    }
    /**
     * 登录视图
     */
    public function login(){
        return view('users.login');
    }
    /**
     * 登录执行
     */
    public function logindo(){
        $account = request()->account;
        $password = request()->password;
        // 查询是否有错误次数
        $key = 'login:conut:'.$account;
        $count = Redis::get($key);
        if($count>=5){
            echo '错误次数超过5次';die;
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $u = UsersModel::where(['tel'=>$account])
        ->orwhere(['user_name'=>$account])
        ->orwhere(['email'=>$account])
        ->first();
            if(empty($u)){
                return redirect('login');
            }
        if($u['password']!=md5($password)){
            // 错误次数
            $count = Redis::incr($key);
            echo '密码错误次数：'.$count;die;
            return redirect('login');
        }else{
            UsersModel::where('uid',$u['uid'])->update(['last_ip'=>$ip]);
            return redirect('index');
        }
        
    }
    /**
     * 登录后首页
     */
    public function index(){
        $userinfo = UsersModel::get();
        return view('users.index',['userinfo'=>$userinfo]);
    }
}
