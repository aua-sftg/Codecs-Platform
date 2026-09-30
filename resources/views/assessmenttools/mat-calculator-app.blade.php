<x-layout.layout>
    <x-slot:title>
        Codecs | Multicriteria Analysis Tool
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Multicriteria Analysis Tool, MAT, agriculture, digitalization, Living Labs, sustainability
    </x-slot:keywords>
    <x-slot:description>
        Multicriteria Analysis Tool - Analyse, compare and rank the economic, environmental and social impacts of digital technologies in CODECS Living Labs
    </x-slot:description>

    <x-slot:head_scripts>
        <link rel="stylesheet" href="{{ asset('assessment_tools/mat_calculator/codecs-mat.css') }}?v={{ filemtime(public_path('assessment_tools/mat_calculator/codecs-mat.css')) }}">
    </x-slot:head_scripts>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('assessment_tools')}}">Assessment Tools</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                Multicriteria Analysis Tool
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4 mt-4 mb-5">
            <div data-codecs-mat></div>
        </div>
    </x-slot:main_body>

    <x-slot:body_scripts>
        <script src="{{ asset('assessment_tools/mat_calculator/codecs-mat.js') }}?v={{ filemtime(public_path('assessment_tools/mat_calculator/codecs-mat.js')) }}" defer></script>
    </x-slot:body_scripts>
</x-layout.layout>
