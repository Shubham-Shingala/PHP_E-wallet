{{-- <!DOCTYPE html>
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
</html> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Payment') }}
        </h2>
    </x-slot>
    <form action="make_payment" method="POST">
        @csrf
        <table align="center">
            <tr>
                <td><select id="from" name="from" required>
                    @foreach ($data as $i)
                        <option value= {{ $i->account_no }}>{{ $i->account_no }}</option>    
                    @endforeach
                </select><br></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Account No." name="to" required><br></td>
            </tr>
            <tr>
                <td><input type="number" name="amount" placeholder="Amount" required><br></td>
            </tr>
            <tr>
                <td><input type="submit" value="Pay"> <input type="reset" value="Reset"></td>
            </tr>
        </table>
        <h2 align="center"> {!! Session::has('message') ? Session::get("message") : '' !!} </h2>
    </form>
    
</x-app-layout>