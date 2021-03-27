<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <h1 align="center" style="color:red;"><b>{!! Session::has('message') ? Session::get("message") : '' !!}</b></h1><br>

        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action='add'>
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Account No.') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="account_no" required autofocus />
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Accountant Name') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="accountant_name" required autofocus />
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Mobile No.') }}" />
                <x-jet-input class="block mt-1 w-full" type="tel" name="mobile" required autofocus />
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('IFSC code') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="ifsc" required autofocus />
            </div>
            <br>
            <div align="right">
                <a href="view_account"> <u> View Account </u> </a>
                <x-jet-button class="ml-4">
                    {{ __('Add') }}
                </x-jet-button>  
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
