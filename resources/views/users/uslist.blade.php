<table border="1">
    <tr>
        <td>id</td>
        <td>用户名</td>
        <td>邮箱</td>
        <td>操作</td>
    </tr>
    @foreach($userinfo as $v)
        <tr>
            <td>{{$v->uid}}</td>
            <td>{{$v->user_name}}</td>
            <td>{{$v->email}}</td>
            <td><a href="#">修改</a></td>
        </tr>
    @endforeach
</table>