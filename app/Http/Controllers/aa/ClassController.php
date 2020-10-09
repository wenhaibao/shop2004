<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
class ClassController extends Controller
{
    /**添加视图 */
    public function create1(){
        return view('class.create1');
    }
    /**添加执行 */
    public function inserts(){
        $data = request()->all();
        // $classmodel = new ClassModel();
        // $classmodel->insert($data);
        $info = ClassModel::insert($data);
        if($info){
            return redirect("list")->with('添加成功');
        }
    }
    /**列表视图 */
    public function list(){
        $info = ClassModel::get();
        return view('class.list',['info'=>$info]);
    }
    /**删除执行 */
    public function deletes(){
        $c_id = request()->c_id;
        $res = ClassModel::where("c_id",$c_id)->delete();
        if($res){
            return redirect("list")->with('删除成功');
        }
    }
    /**修改视图 */
    public function updates(){
        $c_id = request()->c_id;
        $info = ClassModel::where("c_id",$c_id)->first()->toArray();
        return view('class.updates',['info'=>$info]);
    }
    /**修改执行 */
    public function updatedo(){
        $data = request()->all();
        // $classmodel = new ClassModel();
        // $classmodel->insert($data);
        $info = ClassModel::where('c_id',$data['c_id'])->update($data);
        if($info){
            return redirect("list")->with('修改成功');
        }
    }
}
