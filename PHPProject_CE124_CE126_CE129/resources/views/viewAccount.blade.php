<html>
<head>
    <style>
        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
        background-color: #3871db;
        color: white;
        }
    </style>
</head>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Account') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <form action="addAccount">
                @csrf
                <x-jet-button class="ml-4">
                    {{ __('Add Account') }}
                </x-jet-button>
                </form>
                <!-- <a href="addAccount">Add Account</a> -->
                <table align='center' border="2">
                    <tr>
                        <th>account_no</th>
                        <th>accountant_name</th>
                        <th>mobile_no</th>
                        <th>ifsc</th>
                        <th>email</th>
                        <th>balance</th>
                        <th> </th>
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