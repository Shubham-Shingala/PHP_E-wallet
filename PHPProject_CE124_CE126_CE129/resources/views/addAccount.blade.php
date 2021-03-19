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

<x-guest-layout>
    <x-jet-authentication-card>
        <!-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> -->

        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action='add'>
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Account No.') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="account_no" required autofocus />
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('Accountant Name') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="accountant_name" required autofocus />
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('Mobile No.') }}" />
                <x-jet-input class="block mt-1 w-full" type="tel" name="mobile" required autofocus />
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('IFSC code') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="ifsc" required autofocus />
            </div>
            <!-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

                <x-jet-button class="ml-4">
                    {{ __('Add') }}
                </x-jet-button>  
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
