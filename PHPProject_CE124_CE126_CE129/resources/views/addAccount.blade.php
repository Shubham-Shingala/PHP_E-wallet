<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account</title>
</head>
<body>
    <form action="add" method="POST">
        @csrf
        <input type="text" name="account_no" max_length="14" placeholder="Account No." required /><br>
        <input type="text" name="account_name" placeholder="Account Name" required /><br>
        <input type="tel" name="mobile" placeholder="Mobile No." required /><br>
        <input type="text" name="ifsc" placeholder="IFSC code" required /><br>
        <input type="submit" value="ADD">
        <input type="reset" value="Reset">
    </form>
</body>
</html>