<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hi, {{$data['receiver_name']}}
    <br><br>
    {{$data['sender_name']}} ({{$data['sender_email']}}) has requested money from you on E-wallet. On approving the request, Rs. {{$data['amount']}} (A/c {{$data['sender_account_no']}}) will be debited from your account.
</body>
</html>