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
            {{ __('Recieved Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                {!! Session::has('message') ? Session::get("message") : '' !!}
            </div>
        </div>
    </div>
</x-app-layout>