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

        .alert1 {
            padding: 20px;
            background-color: #18d127;
            color: white;
        }

        .alert2 {
            padding: 20px;
            background-color: #ec3333;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
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
    @if(Session::has('message') and (Session::get("message")==='Account Added.' or Session::get("message")==='Payment is done Successfully'))
        <div class="alert1">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {!! Session::has('message') ? Session::get("message") : '' !!}
        </div>
    @endif
    @if(Session::has('message') and Session::get("message")==='Account Removed.')
        <div class="alert2">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {!! Session::has('message') ? Session::get("message") : '' !!}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="addAccount">
                @csrf
                <x-jet-button class="ml-4">
                    {{ __('Add Account') }}
                </x-jet-button>
                </form>
                @if($account_existance)
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
                                <td>
                                    <form action="remove_account{{$item->account_no}}">
                                        @csrf
                                        <x-jet-button class="ml-4">
                                            {{ __('Remove Account') }}
                                        </x-jet-button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </table>
                @else
                    <p align="center"><b>No Account Added.</b></p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>