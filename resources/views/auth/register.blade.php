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
                Create new account
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>

        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                    <h2 class="font-weight-bold text-5 mb-0">Create new account</h2>
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <div class="row">
                            <div class="form-group col">
                                <x-input-label
                                    for="name"
                                    :value="__('Name')"
                                    required
                                ></x-input-label>
                                <x-text-input
                                    id="name"
                                    name="name"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    autocomplete="name"
                                ></x-text-input>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <x-input-label
                                    for="email"
                                    :value="__('Email')"
                                    required
                                ></x-input-label>
                                <x-text-input
                                    id="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autocomplete="email"
                                ></x-text-input>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <x-input-label
                                    for="password"
                                    value="{{ __('Password') }}"
                                    required
                                ></x-input-label>
                                <x-text-input
                                    id="password"
                                    name="password"
                                    :value="old('password')"
                                    required
                                    autocomplete="new-password"
                                    type="password"
                                ></x-text-input>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <x-input-label
                                    for="password_confirmation"
                                    value="{{ __('Confirm password') }}"
                                    required
                                ></x-input-label>
                                <x-text-input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    :value="old('password_confirmation')"
                                    required
                                    autocomplete="new-password-confirmation"
                                    type="password"
                                ></x-text-input>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a class="" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="btn btn-primary border-0">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </x-slot:main_body>


</x-layout.layout>
