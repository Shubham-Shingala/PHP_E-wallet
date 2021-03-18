<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="make_payment" method="POST">
        @csrf
        <select id="from" name="from" required>
            @foreach ($data as $i)
                <option value= {{ $i->account_no }}>{{ $i->account_no }}</option>    
            @endforeach
        </select><br>
        <input type="text" placeholder="Account No." name="to" required><br>
        <input type="number" name="amount" placeholder="Amount" required><br>
        <input type="submit" value="Pay">
        <input type="reset" value="Reset">
    </form>
</body>
</html>