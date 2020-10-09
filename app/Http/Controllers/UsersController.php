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
        // $where = [];
        // if(substr_count($account,'@')){
        //     $where[] =  ['email','=',$account];
        // }else{
        //     $where[] =  ['user_name','=',$account];
        // }
        $res = UsersModel::where(['tel'=>$account])
        ->orwhere(['user_name'=>$account])
        ->orwhere(['email'=>$account])
        ->orwhere(['tel'=>$account])
        ->first();
        if($res['password']!=md5($password)){
            return redirect('login');
        }else{
            return redirect('index');
        }
    }
    /**
     * 登录后首页
     */
    public function index(){
        $num  = Redis::incr('name1');
        echo $num;exit;
        $userinfo = UsersModel::get();
        return view('users.index',['userinfo'=>$userinfo]);
    }
}
