<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>注册</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('/registdo')}}" method="POST">
        <table>
            <tr>
                <td>
                    <input type="text" name="user_name">用户名
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password">密码
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email">email
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tel">手机号
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="注册">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>