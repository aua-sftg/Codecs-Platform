<x-layout.layout>
    <x-slot:title>
        Codecs | Maximising the CO-benefits  of agricultural Digitalisation  through conducive digital ECoSystems
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Maximising, CO-benefits ,agricultural, Digitalisation,  ,digital ,ECoSystems, privacy policy
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Maximising the CO-benefits  of agricultural Digitalisation  through conducive digital ECoSystems
    </x-slot:description>


    <x-slot:hero_section>
        <x-layout.hero-carousel></x-layout.hero-carousel>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-5 my-3">
            <div class="row justify-content-between align-items-center flex-lg-nowrap gy-3">
                <div class="col-lg-6">
                    <p class="font-weight-medium text-3-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="2000">CODECS will develop, and turn into concepts, methods, tools, evidence, a vision of “sustainable digitalisation” with the goal of improving the collective capacity to understand, assess and foresee the full range of benefits and costs of farm digitalisation, and to build digital ecosystems that maximise the net benefits of digitalisation.</p>
                    <a href="https://www.horizoncodecs.eu/" target="_blank" class="custom-view-more d-inline-flex font-weight-medium text-color-primary text-decoration-none appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="3400">
                        Visit CODECS official website
                        <img width="27" height="27" src="{{ asset('img/demos/construction/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" />
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg width="145" height="147" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 145.42 147.12" xml:space="preserve" stroke-miter-limit="10" stroke-dasharray="7" data-appear-animation-svg="true">
								<line stroke="#a2a2a2" stroke-dasharray="8" x1="14.75" y1="132.9" x2="133.81" y2="12.05" class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="2400" data-appear-animation-duration="100ms" />
                        <line stroke="#FFF" stroke-dasharray="8" stroke-width="2" x1="14.75" y1="132.9" x2="133.81" y2="12.05" class="appear-animation" data-appear-animation="customLineDividerAnim" data-appear-animation-delay="2400" data-appear-animation-duration="2.2s" />
							</svg>
                </div>
                <div class="col-lg-4 about_col">
                    <img src="{{ asset('img/digital-platform.png') }}" alt="Platform Image" class="appear-animation platform_img" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="2500"/>
                </div>
            </div>
        </div>
        <section class="section position-relative overflow-hidden border-0 m-0">
            <div class="container pt-5-5 pb-5 mb-3">
{{--                <div class="row mb-5-5">--}}
{{--                    <div class="col">--}}
{{--                        <h2 class="text-color-dark font-weight-bold text-7 line-height-1 mb-3-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">Services</h2>--}}
{{--                        <p class="text-4 font-weight-light appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500">Cras a elit sit amet leo accumsan volutsudisse. </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row g-4">
                    <div class="col-md-6 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="550">
                        <div class="d-flex h-100 " >
                            <div class="px-4 py-2 d-flex flex-column h-100">
                                <img src="{{ asset('img/technologies.png') }}" loading="lazy" alt="Meta-Inventory Image" class="platform_img"/>
                                <h3 class="text-color-custom-blue font-weight-bold text-transform-none text-5 mb-2">Digital Technologies Inventory</h3>
                                <div class="row counters gy-4 gy-md-0">
                                    <div class="col-md-auto mt-0">
                                        <div class="counter">
                                            <strong class="text-color-secondary text-6" data-to="2294" data-append="+" data-plugin-options="{'accY': -200}">0</strong>
{{--                                            <span class="text-color-primary font-weight-bold text-4">Business Year</span>--}}
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-light text-3-5 mb-3-5">Discover more than 2.000 digital technologies in use through all production sectors and application scenarios in European agriculture. Inventory can inspire broader use of digital technologies in this field (farmers and advisors) and help understanding of the dynamic technological landscape and emerging trends (policy-makers)</p>
                                <a {{ (request()->routeIs('meta_inventory_home')) ? 'class="active"' : '' }} href="{{ route('meta_inventory_home') }}" class="custom-view-more d-inline-flex align-items-center align-self-start font-weight-medium text-decoration-none mt-auto px-3 py-2 rounded" style="background-color: #A0B63C; color: #fff;">
                                    Explore
                                    <img width="27" height="27" loading="lazy" src="{{ asset('img/demos/construction/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light ms-2'}" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">
                        <div class="d-flex h-100 ">
                            <div class="px-4 py-2 d-flex flex-column h-100">
                                <img src="{{ asset('img/datasets.png') }}" loading="lazy" alt="Dataset-Inventory Image" class="platform_img"/>
                                <h3 class="text-color-custom-blue font-weight-bold text-transform-none text-5 mb-2">Inventory of Datasets</h3>
                                <div class="row counters gy-4 gy-md-0">
                                    <div class="col-md-auto mt-0">
                                        <div class="counter">
                                            <strong class="text-color-secondary text-6" data-to="10" data-append="+" data-plugin-options="{'accY': -200}">0</strong>
                                            {{--                                            <span class="text-color-primary font-weight-bold text-4">Business Year</span>--}}
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-light text-3-5 mb-3-5">A structured digital repository for CODECS datasets, offering storing abilities to authorized users and centralized access for all its users to harness the potential of data sources and empower objective decision-making and conflict resolution related to various facets of digitalization.</p>
                                <a {{ (request()->routeIs('inventory_of_datasets')) ? 'class="active"' : '' }} href="{{ route('inventory_of_datasets') }}" class="custom-view-more d-inline-flex align-items-center align-self-start font-weight-medium text-decoration-none mt-auto px-3 py-2 rounded" style="background-color: #A0B63C; color: #fff;">
                                    Explore
                                    <img width="27" height="27" loading="lazy" src="{{ asset('img/demos/construction/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light ms-2'}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

        {{-- Assessment Toolkit: one entry per tool, the slug must match AssessmentToolController::show.
             The image is the one set on the tool in the admin (as on /assessment-tools), the image path
             below is only the fallback when a tool has none. --}}
        @php
            try {
                $toolkit_tools = App\Logic\AssessmentToolHelper::get_tools()->keyBy('slug');
            } catch (\Throwable $e) {
                // the home page must still render if the tools lookup fails, the buttons then open the toolkit list
                report($e);
                $toolkit_tools = collect();
            }
            $toolkit_cards = [
                [
                    'slug'  => 'environmental-calculator',
                    'title' => 'Environmental Calculator',
                    'text'  => 'See how digital technologies change a farm\'s environmental footprint, based on real Living Lab results.',
                    'image' => 'img/assessment-tools/home/placeholder-environmental.svg',
                ],
                [
                    'slug'  => 'economic-cost-calculator',
                    'title' => 'Economic Cost Calculator',
                    'text'  => 'Compare the costs and benefits of a digital technology and see if the investment pays off.',
                    'image' => 'img/assessment-tools/home/placeholder-economic.svg',
                ],
                [
                    'slug'  => 'technology-assessment-tool',
                    'title' => 'Technology Assessment Tool',
                    'text'  => 'Match technologies to your priorities using expert impact scores and farmer needs.',
                    'image' => 'img/assessment-tools/home/placeholder-tat.svg',
                ],
                [
                    'slug'  => 'multi-criteria-assessment-tool',
                    'title' => 'Multi-criteria Assessment Tool',
                    'text'  => 'Compare digital ecosystem scenarios across economic, social and environmental sustainability.',
                    'image' => 'img/assessment-tools/home/placeholder-mat.svg',
                ],
            ];
        @endphp
        <section class="section bg-white position-relative overflow-hidden border-0 m-0">
            <div class="container pt-4 pb-5 mb-3">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="toolkit-title font-weight-bold text-7 line-height-1 mb-2 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">Assessment Toolkit</h2>
                        <p class="toolkit-subtitle font-weight-light text-3-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500">Four tools to understand the full picture before, during and after digital adoption.</p>
                    </div>
                </div>
                <div class="row g-1">
                    @foreach($toolkit_cards as $card)
                        @php
                            $toolkit_tool = $toolkit_tools->get($card['slug']);
                            $toolkit_link = $toolkit_tool
                                ? route('assessment_tool_detailed', ['tool_slug' => $toolkit_tool['slug'], 'tool_inv_id' => $toolkit_tool['_id']])
                                : route('assessment_tools');
                            // same image the tool has on /assessment-tools, the placeholder is only the fallback
                            $toolkit_image = ($toolkit_tool && $toolkit_tool->image)
                                ? Storage::disk('assessmenttools')->url($toolkit_tool->image)
                                : asset($card['image']);
                        @endphp
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="{{ 550 + $loop->index * 200 }}">
                            <div class="toolkit-card h-100">
                                <div class="toolkit-card-body">
                                    <h3 class="text-color-custom-blue font-weight-bold text-transform-none text-5 mb-2">{{ $card['title'] }}</h3>
                                    <p class="font-weight-light text-3-5 mb-0">{{ $card['text'] }}</p>
                                </div>
                                <img src="{{ $toolkit_image }}" loading="lazy" alt="{{ $card['title'] }}" class="toolkit-card-img">
                                <a href="{{ $toolkit_link }}" class="toolkit-card-btn custom-view-more d-inline-flex align-items-center font-weight-medium text-decoration-none px-3 py-2 rounded" style="background-color: #A0B63C; color: #fff;">
                                    Explore
                                    <img width="27" height="27" loading="lazy" src="{{ asset('img/demos/construction/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light ms-2'}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="position-absolute transform3dy-n50 right-0 pe-5 me-4">
                <div class="appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1700" data-appear-animation-duration="750ms">
                    <div class="custom-square-1 bg-primary mb-5"></div>
                </div>
            </div>
            <div class="position-absolute transform3dy-n50 right-15 pe-5 me-5">
                <div class="appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1500" data-appear-animation-duration="750ms">
                    <div class="custom-square-1 background_custom_blue pe-5 me-5 mt-4 mb-5"></div>
                </div>
            </div>
        </section>
    </x-slot:main_body>

</x-layout.layout>
