<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**添加视图 */
    public function uscreate(){
        return view('users.uscreate');
    }
    /**添加执行 */
    public function uscreatedo(){
        $data = request()->all();
        $reg_time = time();
        $data['reg_time'] = $reg_time;
        $data['password'] = md5($data['password']);
        $res = DB::table('users')->insert($data);
        if($res){
            return redirect('uslist')->with('添加成功');
        }
    }
    /**列表视图 */
    public function uslist(){
        $userinfo = DB::table('users')->get();
        return view('users.uslist',['userinfo'=>$userinfo]);
    }
    /**修改视图 */
    public function usupdate(){
        $uid = request()->uid;
        $info = DB::table('users')->where('uid',$uid)->first();
        return view('users.usupdate',['info'=>$info]);
    }
    /**修改执行 */
    public function usupdatedo(){
        $data = request()->all();
        $res = DB::table('users')->where('uid',$data['uid'])->update($data);
        if($res){
            return redirect('uslist')->with('修改成功');
        }
    }
    /**删除执行 */
    public function usdelete(){
        $uid = request()->uid;
        $res = DB::table('users')->where('uid',$uid)->delete();
        if($res){
            return redirect('uslist')->with('删除成功');
        }
    }
    /**登录视图 */
    public function uslogin(){
        return view('users.uslogin');
    }
    /**登录执行 */
    public function uslogindo(){
        $data = request()->all();
        // dd($data);
        $where = [
            ['user_name','=',$data['user_name']],
            ['password','=',md5($data['password'])]
        ];
        $res = DB::table('users')->where($where)->first();
        // dd($res);
        if($res){
            $date['last_login'] = time();
            $date['login_count'] = $res->login_count+1;
            // $data['password'] = md5($data['password']);
            DB::table('users')->where('uid',$res->uid)->update($date);
            return redirect('usloginlist')->with('登录成功');
        }
    }
    /**登录后视图 */
    public function usloginlist(){
        return view('users.usloginlist');
    }
}
