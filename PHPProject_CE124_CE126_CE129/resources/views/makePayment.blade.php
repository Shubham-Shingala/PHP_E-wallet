<x-guest-layout>
    <x-jet-authentication-card>
        
        <h1 align="center" style="color:red;"><b>{!! Session::has('message') ? Session::get("message") : '' !!}</b></h1>

        <x-jet-validation-errors class="mb-4" />
        <form action="make_payment" method="POST">
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Select Your Account No.') }}" />
                <select id="from" class="block mt-1 w-full" name="from" required autofocus >
                @foreach ($data as $i)
                    <option value= {{ $i->account_no }}>{{ $i->account_no }}</option>
                @endforeach
                </select>
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('(Pay To)Accountant No.') }}" />
                <input class="block mt-1 w-full" type="text" required autofocus name="to" value=<?php if(isset($account_no)) {echo $account_no;}?>>
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Amount') }}" />
                <input class="block mt-1 w-full" type="number" required autofocus name="amount" value=<?php if(isset($amount)) {echo $amount;}?>>
            </div>
            <br>
            <input type="number" name="received_req_id" hidden  value=<?php if(isset($id)) {echo $id;}?>>
            <div align="right">
                <a href="view_account"> <u> View Account </u> </a>
                <x-jet-button class="ml-4">
                    {{ __('Pay') }}
                </x-jet-button>  
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>