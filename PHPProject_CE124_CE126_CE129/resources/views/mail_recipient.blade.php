<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hi, {{ $data2['name'] }}
    <br><br>
    Rs. {{$data2['amount']}} Received from A/c {{$data2['sender_account_no']}}({{ $data2['sender_name'] }}) to A/c {{$data2['recipient_account_no']}}.
    <br>
    Total Available Balance : {{$data2['recipient_bal']}}
</body>
</html>