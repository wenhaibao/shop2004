<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandtestController extends Controller
{
    // 添加视图
    public function brcreate(){
        return view('brandtest.brcreate');
    }
    // 添加执行
    public function createdo(){
        $data = request()->all();
        $res = DB::table('brandtest')->insert($data);
        if($res){
            return redirect('brandtestlist')->with('添加成功');
        }
    }
    // 列表展示
    public function brandtestlist(){
        $brandtestinfo = DB::table('brandtest')->get();
        return view('brandtest.brandtestlist',['brandtestinfo'=>$brandtestinfo]);
    }
    // 修改视图
    public function brandtestupdate(){
        $br_id = request()->br_id;
        $firstinfo = DB::table('brandtest')->where('br_id',$br_id)->first();
        return view('brandtest.brandtestupdate',['firstinfo'=>$firstinfo]);
    }
    // 修改执行
    public function brandtestupdatedo(){
        $data = request()->all();
        $res = DB::table('brandtest')->where('br_id',$data['br_id'])->update($data);
        if($res){
            return redirect('brandtestlist')->with('修改成功');
        }
    }
}
