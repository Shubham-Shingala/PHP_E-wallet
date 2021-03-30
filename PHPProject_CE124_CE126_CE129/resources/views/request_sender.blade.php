<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hi, {{ $data['sender_name'] }}
    <br><br>
    You have requested money to {{$data['receiver_name']}} ({{$data['receiver_email']}}) on E-wallet. On approving the request by {{$data['receiver_name']}}, Rs. {{$data['amount']}} (A/c {{$data['sender_account_no']}}) will be credited to your account.
</body>
</html>