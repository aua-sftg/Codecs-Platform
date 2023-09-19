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
                {{auth()->user()->name.' '. __('Profile') }}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4">
            <div class="row ">
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 shadow p-3">
                    @include('profile.partials.sidebar')
                </div>
                <div class="col-md-6 col-lg-9 mb-5 mb-lg-0">
                    <div class="p-3" id="/user-information">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <hr>
                    <div class="p-3 mt-2" id="/password-reset">
                        @include('profile.partials.update-password-form')
                    </div>
                    <hr>
                    <div class="p-3 mt-2" id="delete-user">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-slot:main_body>


</x-layout.layout>
