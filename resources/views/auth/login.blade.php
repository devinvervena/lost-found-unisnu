<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        <div class="mt-4 text-center">
    <p class="text-sm text-gray-600">Belum punya akun?</p>
    <a href="{{ route('register') }}" class="text-sm text-[#00743f] font-bold hover:underline">
    Daftar di sini
    </a>
</div>    
        </div>

      <div class="mt-4 flex flex-col gap-3">
    <x-primary-button class="w-full justify-center py-3">
        {{ __('Log in') }}
    </x-primary-button>
    
    @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 text-center" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif
</div>
    </form>
</x-guest-layout>
