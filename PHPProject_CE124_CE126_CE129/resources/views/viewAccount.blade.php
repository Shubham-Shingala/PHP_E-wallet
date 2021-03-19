{{-- <!DOCTYPE html>
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
</html> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="addAccount">Add Account</a>
                <table align='center' border="2">
                    <tr>
                        <th>account_no</th>
                        <th>accountant_name</th>
                        <th>mobile_no</th>
                        <th>ifsc</th>
                        <th>email</th>
                        <th>balance</th>
                        
                    </tr>           
                @foreach ($data as $item)        
                        <tr>
                            <td>{{$item->account_no}}</td>
                            <td>{{$item->accountant_name}}</td>
                            <td>{{$item->mobile_no}}</td>
                            <td>{{$item->ifsc}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->balance}}</td>
                            <td><a href="remove_account{{$item->account_no}}">Remove Account</a>
                        </tr>
                @endforeach
                </table>
                {!! Session::has('message') ? Session::get("message") : '' !!}
            </div>
        </div>
    </div>
</x-app-layout>