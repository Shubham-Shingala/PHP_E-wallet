<x-guest-layout>
    <x-jet-authentication-card>
        
        <h1 align="center" style="color:red;"><b>{!! Session::has('message') ? Session::get("message") : '' !!}</b></h1>

        <x-jet-validation-errors class="mb-4" />
        <form action="recharge" method="POST">
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Select Mobile Operators') }}" />
                <select class="block mt-1 w-full" name="mobile_operator" required autofocus >
                    <option value='Jio'>Jio Prepaid</option>
                    <option value='Vi'>Vi Prepaid</option>
                    <option value='Airtel'>Airtel Prepaid</option>
                </select>
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Mobile Number') }}" />
                <input class="block mt-1 w-full" type="text" required autofocus name="mob_no" maxlength="10" minlength="10" pattern="[0-9]{10}" title="Please Enter 10 digits Mobile Number">
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Plan') }}" />
                <input class="block mt-1 w-full" type="number" required autofocus name="plan" min=1>
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Select Your Account No.') }}" />
                <select class="block mt-1 w-full" name="acc_no" required autofocus >
                @foreach ($data as $i)
                    <option value= {{ $i->account_no }}>{{ $i->account_no }}</option>
                @endforeach
                </select>
            </div>
            <br>
            <div align="right">
                <a href="view_account"> <u> View Account </u> </a>
                <x-jet-button class="ml-4">
                    {{ __('Buy') }}
                </x-jet-button>  
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>