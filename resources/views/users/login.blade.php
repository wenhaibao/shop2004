<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/logindo')}}" method="POST">
        <table>
            <tr>
                <td><input type="text" name="account">用户名</td>
            </tr>
            <tr>
                <td><input type="password" name="password">密码</td>
            </tr>
            <tr>
                <td><input type="submit" value="登录"></td>
            </tr>
        </table>
    </form>
</body>
</html>