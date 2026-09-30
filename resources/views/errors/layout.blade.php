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
                Error {{$error_number}}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:head_scripts>
        <style>
            .error_number {
                font-size: 156px;
                font-weight: 600;
                line-height: 100px;
            }
            .error_number small {
                font-size: 56px;
                font-weight: 700;
            }

            .error_number hr {
                margin-top: 60px;
                margin-bottom: 0;
                width: 50px;
            }

            .error_title {
                margin-top: 40px;
                font-size: 36px;
                font-weight: 400;
            }

            .error_description {
                font-size: 24px;
                font-weight: 400;
            }
        </style>
    </x-slot:head_scripts>

    <x-slot:main_body>
        <div class="container mb-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="error_number text-black">
                        <small>ERROR</small><br>
                        {{ $error_number }}
                        <hr>
                    </div>
                    <div class="error_title text-black">
                        @yield('title')
                    </div>
                    <div class="error_description text-black">
                        <small>
                            @yield('description')
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:main_body>
</x-layout.layout>



