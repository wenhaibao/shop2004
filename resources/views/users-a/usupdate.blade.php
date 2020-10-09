<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="usupdatedo" method="POST">
        <table>
            <tr><input type="hidden" name="uid" value="{{$info->uid}}">
                <td><input type="text" name="user_name" value="{{$info->user_name}}">用户名</td>
            </tr>
            <tr>
                <td><input type="text" name="email" value="{{$info->email}}">邮箱</td>
            </tr>
            <tr>
                <td><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>