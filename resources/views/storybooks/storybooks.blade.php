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
            <div class="d-flex w-100 flex-column flex-md-row align-items-center justify-content-center gap-5 mb-5">
                <iframe id="storybook-iframe" allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" 
                        src="{{ $storybooks[0]['iframe_url'] }}" 
                        style="border: 1px solid lightgray; width: 100%; height: 800px;"></iframe>
            </div>

            <div class="row mt-5">
                <div class="col mt-5">
                    <div class="carousel-half-full-width-wrapper carousel-half-full-width-right mt-5">
                        <div class="owl-carousel owl-theme carousel-half-full-width-right nav-bottom nav-bottom-align-left nav-style-1 nav-dark nav-font-size-lg mb-0 w-100" data-plugin-options="{'responsive': {'0': {'items': 1}, '768': {'items': 3}, '992': {'items': 4}, '1200': {'items': 5}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">
                            @foreach($storybooks as $index => $storybook)
                                <div>
                                    <span class="thumb-info thumb-info-centered-info thumb-info-no-borders storybook-item {{ $index === 0 ? 'active' : '' }}" 
                                          data-iframe-src="{{ $storybook['iframe_url'] }}"
                                          data-storybook-id="{{ $storybook['id'] }}">
                                        <span class="thumb-info-wrapper">
                                            <img src="{{ asset($storybook['cover']) }}" class="img-fluid" alt="{{ $storybook['title'] }}">
                                            <span class="thumb-info-title">
                                                <span class="thumb-info-inner">{{ $storybook['title'] }}</span>
                                                <span class="thumb-info-type">View</span>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:main_body>

    <x-slot:body_scripts>
        <script>
            $(document).ready(function() {
                // Handle clicks on carousel items
                $('.storybook-item').on('click', function() {
                    var newSrc = $(this).data('iframe-src');
                    var storybookId = $(this).data('storybook-id');
                    
                    // Update iframe source
                    $('#storybook-iframe').attr('src', newSrc);
                    
                    // Update active state
                    $('.storybook-item').removeClass('active');
                    $(this).addClass('active');
                    
                    // Optional: Add loading state
                    $('#storybook-iframe').on('load', function() {
                        console.log('Storybook ' + storybookId + ' loaded successfully');
                    });
                });
            });
        </script>
        
        <style>
            .storybook-item {
                cursor: pointer;
                transition: transform 0.2s ease;
            }
            
            .storybook-item:hover {
                transform: translateY(-5px);
            }
            
            .storybook-item.active {
                border: 3px solid #007bff;
                border-radius: 8px;
            }
        </style>
    </x-slot:body_scripts>
</x-layout.layout>