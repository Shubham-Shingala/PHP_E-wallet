<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Mail</title>
</head>
<body>
    Hi, {{$data['name']}}
    <br><br>
    Recharge of Rs. {{$data['plan']}} is successful for your {{$data['mobile_operator']}} number {{$data['mob_no']}} from A/c {{$data['acc_no']}}.
    <br>
    Total Available Balance : {{$data['balance']}}
</body>
</html>