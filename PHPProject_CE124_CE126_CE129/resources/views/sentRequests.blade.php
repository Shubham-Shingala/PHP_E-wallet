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

        .alert {
            padding: 20px;
            background-color: #18d127;
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
            {{ __('Sent Request') }}
        </h2>
    </x-slot>
    @if(Session::has('message') and Session::get("message")==='Request Sent Successfully.')
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {!! Session::has('message') ? Session::get("message") : '' !!}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($requests_existence)
                    <table align='center'>
                        <tr>
                            <th>Your Account Number</th>
                            <th>Requseted To (Email)</th>
                            <th>Amount</th>
                            <th>Request Date And Time</th>
                            <th>Status</th>
                        </tr>           
                        @foreach ($requests as $request)        
                            <tr>
                                <td>{{$request->sender_account_no}}</td>
                                <td>{{$request->receiver_email}}</td>
                                <td>{{$request->amount}}</td>
                                <td>{{$request->created_at}}</td>
                                <td>
                                    @if(!$request->paid)
                                        Not Paid
                                    @else
                                        Paid
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p align="center"><b>No Sent Request.</b></p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>