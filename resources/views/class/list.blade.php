<table border="1">
    <tr>
        <td>id</td>
        <td>班级</td>
        <td>操作</td>
    </tr>
    @foreach($info as $v)
        <tr>
           <td>{{$v->c_id}}</td> 
           <td>{{$v->c_name}}</td> 
           <td><a href="{{url('deletes?c_id='.$v->c_id)}}">删除</a>
           <a href="{{url('updates?c_id='.$v->c_id)}}">修改</a></td> 
        </tr>
    @endforeach
</table>