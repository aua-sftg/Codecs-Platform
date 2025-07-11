<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Storybooks
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Inventory, Storybooks, agriculture, digitalization, tools
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Storybooks
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Storybooks
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4 mt-4 mb-5">
            <div class="row">
                <div class="col">
                    <div class="products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        @forelse(App\Logic\AssessmentToolHelper::get_tools() as $tool)
                            <div class="column">
                                @php
                                    $imageUrl = $tool->image ? Storage::disk('assessmenttools')->url($tool->image) : null;
                                    $fileUrl = $tool->file ? Storage::disk('assessmenttools')->url($tool->file) : null;
                                @endphp
                                <x-assessmenttools.assessment_tool_card :dataset="$tool" :image="$imageUrl" :fileUrl="$fileUrl">

                                </x-assessmenttools.assessment_tool_card>
                                <div class="col">
                                    <hr class="my-4">
                                </div>
                            </div>
                        @empty
                            <div class="w-100 text-center">
                                <img src="{{ asset('img/undraw_loading_re_5axr.svg') }}" alt="No results found" class="w-100" style="max-width: 300px"/>
                                <p class="mb-0">No tools found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </x-slot:main_body>


</x-layout.layout>
