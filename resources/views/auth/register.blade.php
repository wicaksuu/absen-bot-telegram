<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Informasi tambahan pengguna -->
            <div class="mt-4">
                <x-label for="nip" value="{{ __('NIP') }}" />
                <x-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" />
            </div>

            <div class="mt-4">
                <x-label for="nomorhp" value="{{ __('Nomor HP') }}" />
                <x-input id="nomorhp" class="block mt-1 w-full" type="text" name="nomorhp" :value="old('nomorhp')" />
            </div>

            <div class="mt-4">
                <x-label for="telegramid" value="{{ __('Telegram ID') }}" />
                <x-input id="telegramid" class="block mt-1 w-full" type="text" name="telegramid" :value="old('telegramid')" />
            </div>

            <div class="mt-4">
                <x-label for="imeiAbsen" value="{{ __('IMEI Absen') }}" />
                <x-input id="imeiAbsen" class="block mt-1 w-full" type="text" name="imeiAbsen" :value="old('imeiAbsen')" />
            </div>

            <div class="mt-4">
                <x-label for="usernameAbsen" value="{{ __('Username Absen') }}" />
                <x-input id="usernameAbsen" class="block mt-1 w-full" type="text" name="usernameAbsen" :value="old('usernameAbsen')" />
            </div>

            <div class="mt-4">
                <x-label for="passwordAbsen" value="{{ __('Password Absen') }}" />
                <x-input id="passwordAbsen" class="block mt-1 w-full" type="text" name="passwordAbsen" :value="old('passwordAbsen')" />
            </div>

            <div class="mt-4">
                <x-label for="tokenAbsen" value="{{ __('Token Absen') }}" />
                <x-input id="tokenAbsen" class="block mt-1 w-full" type="text" name="tokenAbsen" :value="old('tokenAbsen')" />
            </div>

            <div class="mt-4">
                <x-label for="userAgentAbsen" value="{{ __('User Agent Absen') }}" />
                <x-input id="userAgentAbsen" class="block mt-1 w-full" type="text" name="userAgentAbsen" :value="old('userAgentAbsen')" />
            </div>

            <div class="mt-4">
                <x-label for="lat_absen" value="{{ __('Lat Absen') }}" />
                <x-input id="lat_absen" class="block mt-1 w-full" type="text" name="lat_absen" :value="old('lat_absen')" />
            </div>

            <div class="mt-4">
                <x-label for="long_absen" value="{{ __('Long Absen') }}" />
                <x-input id="long_absen" class="block mt-1 w-full" type="text" name="long_absen" :value="old('long_absen')" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
