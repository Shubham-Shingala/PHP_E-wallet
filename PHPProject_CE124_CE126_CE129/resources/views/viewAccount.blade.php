<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="addAccount">Add Account</a>
    @foreach ($data as $item)
        <table border="1">
            <tr>
                <td>{{$item->account_no}}</td>
                <td>{{$item->account_name}}</td>
                <td>{{$item->mobile_no}}</td>
                <td>{{$item->ifsc}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->balance}}</td>
                <td><a href="remove_account{{$item->account_no}}">Remove Account</a>
            </tr>
        </table>
    @endforeach
    {!! Session::has('message') ? Session::get("message") : '' !!}
</body>
</html>