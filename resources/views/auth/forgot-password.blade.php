<x-layout.layout>
    <x-slot:title>
        Codecs | Meta-Inventory
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Recover password
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>

        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                    <h2 class="font-weight-bold text-5 mb-0">Password recovery process</h2>

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Email Password Reset Link') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </x-slot:main_body>


</x-layout.layout>
