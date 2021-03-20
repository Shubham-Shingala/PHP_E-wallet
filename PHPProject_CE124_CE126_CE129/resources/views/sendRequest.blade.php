<x-guest-layout>
    <x-jet-authentication-card>
        <!-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> -->

        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action='send'>
            @csrf
            <div>
                {{-- <x-jet-label for="email" value="{{ __('Account No.') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="account_no" required autofocus /> --}}
                <select id="sender_account_no" name="sender_account_no" required>
                    @foreach ($data as $i)
                        <option value= {{ $i->account_no }}>{{ $i->account_no }}</option>    
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Request To.. (E-mail)') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="receiver_email" required autofocus />
            </div>
            <br>
            <div>
                <x-jet-label for="email" value="{{ __('Amount') }}" />
                <x-jet-input class="block mt-1 w-full" type="number" name="amount" required autofocus />
            </div>
            <br>
            <div align="right">
                <a href="view_account"> <u> View Account </u> </a>
                <x-jet-button class="ml-4">
                    {{ __('Send') }}
                </x-jet-button>  
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>