<table>
    <tr>
        <td>id</td>
        <td>班级</td>
    </tr>
    @foreach ($classinfo as $v)
        <tr>
            <td>{{$v->cl_id}}</td>
            <td>{{$v->cl_name}}</td>
        </tr>
    @endforeach
</table>