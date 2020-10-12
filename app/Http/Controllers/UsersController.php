<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
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
    public function registdo(UsersCreateRequest $request){
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
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $u = UsersModel::where(['tel'=>$account])
        ->orwhere(['user_name'=>$account])
        ->orwhere(['email'=>$account])
        ->first();
        // dd($u);
        // 查询是否有错误次数
        $count = Redis::get('user_'.$u['uid']);
        if($count>=5){
            echo '错误次数超过5次,已锁定十分钟';die;
        }
            if(empty($u)){
                return redirect('login');
            }
        if($u['password']!=md5($password)){
            // 错误次数 
            if($count){
                $count = Redis::incr('user_'.$u['uid']);
            }else{
                $count = Redis::setex('user_'.$u['uid'],10*60,1);
            }
            

            echo '密码错误次数：'.Redis::get('user_'.$u['uid']).'错误次数超过五次将锁定十分钟';;die;
            return redirect('login');
        }else{
            session(['userinfo'=>$u]);
            UsersModel::where('uid',$u['uid'])->update(['last_ip'=>$ip]);
            return redirect('index');
        }
        
    }
    /**
     * 登录后首页
     */
    public function index(){
        $userinfo = session('userinfo');
        if(!empty($userinfo['uid'])){
            echo '欢迎'.$userinfo['user_name'].'登录';
        }else{
            return redirect('/login');
        }
        $userinfo = UsersModel::get();
        return view('users.index',['userinfo'=>$userinfo]);
    }
    /**退出 */
    public function quit(){
        $udd = session(['userinfo'=>null]);
        return redirect('/login');
    }
}
