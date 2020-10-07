<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="brandtestupdatedo" method="POST">
        <tr>
            <input type="hidden" name="br_id" value="{{$firstinfo->br_id}}">
            <td><input type="text" name="br_name" value="{{$firstinfo->br_name}}" placeholder="班级"></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"></td>
        </tr>
    </form>
</body>
</html>