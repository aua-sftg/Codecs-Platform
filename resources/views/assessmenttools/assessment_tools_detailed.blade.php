<x-layout.layout>
    <x-slot:title>
        Codecs | Assessment Tools / {{ $meta['title'] }}
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Inventory, Assessment Toolkit, agriculture, digitalization, tools, Calculators
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Assessment Tools / {{ $meta['description'] }}
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('assessment_tools')}}">Calculators</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                {{$meta['title']}}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">
            <div class="col-12 mt-5 mb-5">
                @if($isEnvironmentalCalculator)
                    @include('assessmenttools.partials.environmental-calculator')
                @else
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $assessment_tool['name'] }}</h2>
                            <p>{{ $assessment_tool['description'] }}</p>
                            {{-- Add other default content here --}}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-slot:main_body>
</x-layout.layout>
