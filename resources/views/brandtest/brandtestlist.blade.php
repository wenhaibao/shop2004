<table border="1">
    <tr>
        <td>id</td>
        <td>名称</td>
        <td>操作</td>
    </tr>
    @foreach($brandtestinfo as $v)
        <tr>
            <td>{{$v->br_id}}</td>
            <td>{{$v->br_name}}</td>
            <td><a href="{{url('brandtestupdate?br_id='.$v->br_id)}}">修改</a></td>
        </tr>
    @endforeach
</table>