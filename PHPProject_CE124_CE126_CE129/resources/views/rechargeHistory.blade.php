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
            {{ __('Recharge History') }}
        </h2>
    </x-slot>
    @if(Session::has('message') and Session::get("message")==='Recharge is done Successfully')
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {!! Session::has('message') ? Session::get("message") : '' !!}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($recharges_existence)
                    <table align='center' border='2'>
                        <tr>
                            <th>Mobile No.</th>
                            <th>Account No.</th>
                            <th>Plan</th>
                            <th>Mobile Operator</th>
                            <th>Recharge Time</th>
                        </tr>
                    @foreach($recharges as $i)
                        <tr>
                            <td>{{$i->mobile_no}}</td>
                            <td>{{$i->account_no}}</td>
                            <td>{{$i->plan}}</td>
                            <td>{{$i->mobile_operator}}</td>
                            <td>{{$i->created_at}}</td>
                        </tr>
                    @endforeach
                    </table>
                @else
                    <p align="center"><b>No Recharge Has Done Yet.</b></p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

