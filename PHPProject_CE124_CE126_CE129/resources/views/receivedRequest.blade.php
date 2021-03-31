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
                @if($requests_existence)
                    <table align='center'>
                        <tr>
                            <th>Sender Email</th>
                            <th>Sender Account Number</th>
                            <th>Amount</th>
                            <th>Request Date and Time</th>
                            <th>Status</th>
                        </tr>           
                        @foreach ($requests as $request)        
                            <tr>
                                <td>{{$request->sender_email}}</td>
                                <td>{{$request->sender_account_no}}</td>
                                <td>{{$request->amount}}</td>
                                <td>{{$request->created_at}}</td>
                                <td>
                                    @if(!$request->paid)
                                        <form action="pay" method="POST">
                                            @csrf
                                            <input type="text"  name="account_no" hidden value= {{$request->sender_account_no}} >
                                            <input type="number" name="amount" hidden value={{$request->amount}}>
                                            <input type="number" name="id" hidden value={{$request->id}}>
                                            <x-jet-button class="ml-4">
                                                {{ __('Pay') }}
                                            </x-jet-button>
                                        </form>
                                    @else
                                        Paid
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p align="center"><b>No Received Request.</b></p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>