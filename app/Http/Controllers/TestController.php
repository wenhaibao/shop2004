<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function hello(){
        echo 'hello laravel';
    }
    // 添加视图
    public function create(){
        return view('test/create');
    }
    // 添加执行
    public function save(){
        // 接值
        $data = request()->except('_token');
        $res = DB::table('class')->insert($data);
        if($res){
            return view('test/index');
        }else{
            return view('test/create');
        }
    }
    // 列表视图
    public function index(){
        $classinfo = DB::table('class')->get();
        // dd($classinfo);
        return view('test/index',['classinfo'=>$classinfo]);
    }
}
