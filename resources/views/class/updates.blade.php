<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="updatedo" method="post">
        <tr>
            <input type="hidden" name="c_id" value="{{$info['c_id']}}">
            <td><input type="text" placeholder="贝纳街" value="{{$info['c_name']}}" name="c_name"></td>
            <td><input type="submit" value="体骄傲"></td>
        </tr>
    </form>
</body>
</html>