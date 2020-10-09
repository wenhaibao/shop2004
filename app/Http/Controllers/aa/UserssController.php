<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserssModel;
class UserssController extends Controller
{
    /**添加视图 */
    public function usersscreate(){
        return view('userss.usersscreate');
    }
    /**添加执行 */
    public function usersscreatedo(){
        $data = request()->all();
        // $classmodel = new ClassModel();
        // $classmodel->insert($data);
        $info = UserssModel::insert($data);
        if($info){
            return redirect("uslist")->with('添加成功');
        }
    }
    /**列表视图 */
    public function uslist(){
        $info = UserssModel::limit('10')->orderBy('user_id','desc')->get();
        return view('userss.uslist',['info'=>$info]);
    }
    /**修改视图 */
    public function usupdate(){
        $user_id = request()->user_id;
        $info = UserssModel::where('user_id',$user_id)->first();
        return view('userss.usupdate',['info'=>$info]);
    }
    /**修改执行 */
    public function userssupdatedo(){
        $data = request()->all();
        $res = UserssModel::where('user_id',$data['user_id'])->update($data);
        if($res){
            return redirect("uslist")->with('修改成功');
        }
    }
    /**删除执行 */
    public function usdelete(){
        $user_id = request()->user_id;
        $res = UserssModel::where('user_id',$user_id)->delete();
        if($res){
            return redirect("uslist")->with('删除成功');
        }
    }
}
