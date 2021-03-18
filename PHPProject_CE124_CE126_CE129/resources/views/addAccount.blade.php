{{-- <!DOCTYPE html>
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
</html> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="add" method="POST">
                    @csrf
                    <input type="text" name="account_no" max_length="14" placeholder="Account No." required /><br>
                    <input type="text" name="account_name" placeholder="Account Name" required /><br>
                    <input type="tel" name="mobile" placeholder="Mobile No." required /><br>
                    <input type="text" name="ifsc" placeholder="IFSC code" required /><br>
                    <input type="submit" value="ADD">
                    <input type="reset" value="Reset">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
