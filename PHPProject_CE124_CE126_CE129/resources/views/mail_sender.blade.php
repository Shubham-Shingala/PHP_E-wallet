<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hi, {{ $data1['name'] }}
    <br><br>
    Rs. {{$data1['amount']}} transferred from A/c {{$data1['sender_account_no']}} to A/c {{$data1['recipient_account_no']}} ({{ $data1['recipient_name'] }}).
    <br>
    Total Available Balance : {{$data1['sender_bal']}}
</body>
</html>