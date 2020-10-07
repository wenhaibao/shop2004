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
    public function uslist(){
        $userinfo = DB::table('users')->get();
        return view('users.uslist',['userinfo'=>$userinfo]);
    }
}
