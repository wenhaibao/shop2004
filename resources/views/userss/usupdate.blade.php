<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="userssupdatedo" method="POST">
        <table>
            <tr>
                <input type="hidden" value="{{$info->user_id}}" name="user_id">
                <td><input type="text" value="{{$info->user_name}}" name="user_name">用户名</td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>