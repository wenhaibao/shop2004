<table border="1">
    <tr>
        <td>id</td>
        <td>账号</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    @foreach($info as $v)
        <tr>
            <td>{{$v->user_id}}</td>
            <td>{{$v->user_name}}</td>
            <td>{{$v->password}}</td>
            <td><a href="{{url('usupdate?user_id='.$v->user_id)}}">修改</a>|<a href="{{url('usdelete?user_id='.$v->user_id)}}">删除</a></td>
        </tr>

    @endforeach
</table>