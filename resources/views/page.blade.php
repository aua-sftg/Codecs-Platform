<x-layout.layout>
    <x-slot:title>
        Codecs | Privacy Policy
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Maximising, CO-benefits ,agricultural, Digitalisation,  ,digital ,ECoSystems, privacy policy
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Privacy Policy
    </x-slot:description>


    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                {{$page->title}}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container page-content">
            {!! $page->body !!}
        </div>
    </x-slot:main_body>

    <x-slot:head_scripts>
        <style>
            .page-content table{
                width: 100%;
                border-collapse: collapse;
            }
            .page-content{
                padding: 55px 15px;
            }
            @media (max-width: 992px) {
                .page-content table tr{
                    display: flex;
                    flex-flow: column;
                    align-items: center;
                }
            }

        </style>
    </x-slot:head_scripts>
</x-layout.layout>
