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
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table align='center' border='2'>
                    <tr>
                        <th>Sender Account No.</th>
                        <th>Recipient Account No.</th>
                        <th>Amount</th>
                        <th>Sender Name</th>
                        <th>Recipient Name</th>
                        <th>Transaction Time</th>
                    </tr>
                @foreach($transactions as $i)
                    <tr>
                        <td>{{$i->sender_account_no}}</td>
                        <td>{{$i->recipient_account_no}}</td>
                        <td>
                        @if($i->sender_email == $user_email)
                            -{{$i->amount}}
                        @else
                            +{{$i->amount}}
                        @endif
                        </td>
                        <td>{{$i->sender_name}}</td>
                        <td>{{$i->recipient_name}}</td>
                        <td>{{$i->created_at}}</td>
                    </tr>
                @endforeach
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>

