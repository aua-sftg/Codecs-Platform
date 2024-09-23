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
                <div class="row">
                    <div class="col-md-6 mb-5 appear-animation box-shadow-2" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="550">
                        <div class="d-flex">
                            <div class="px-4 py-2">
                                <h3 class="text-color-dark font-weight-bold text-transform-none text-5 mb-2">Meta-inventory</h3>
                                <img src="{{ asset('img/metainventory.webp') }}" loading="lazy" alt="Meta-Inventory Image" class="platform_img"/>
                                <div class="row counters gy-4 gy-md-0">
                                    <div class="col-md-auto mt-0">
                                        <div class="counter">
                                            <strong class="text-color-secondary text-6" data-to="2294" data-append="+" data-plugin-options="{'accY': -200}">0</strong>
{{--                                            <span class="text-color-primary font-weight-bold text-4">Business Year</span>--}}
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-light text-3-5 mb-3-5">A comprehensive inventory of digital technologies, offering a centralized, tailored to the user needs overview of technologies, across various domains, supporting understanding of the dynamic technological landscape and the emerging trends, for better-informed decisions in technology adoption and innovation.</p>
                                <a {{ (request()->routeIs('meta_inventory_home')) ? 'class="active"' : '' }} href="{{ route('meta_inventory_home') }}" class="custom-view-more d-inline-flex font-weight-medium text-color-primary text-decoration-none">
                                    Explore
                                    <img width="27" height="27" loading="lazy" src="{{ asset('img/demos/construction/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5 appear-animation box-shadow-2" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">
                        <div class="d-flex">
                            <div class="px-4 py-2">
                                <h3 class="text-color-dark font-weight-bold text-transform-none text-5 mb-2">Inventory of Datasets</h3>
                                <img src="{{ asset('img/dataset.webp') }}" loading="lazy" alt="Dataset-Inventory Image" class="platform_img"/>
                                <div class="row counters gy-4 gy-md-0">
                                    <div class="col-md-auto mt-0">
                                        <div class="counter">
                                            <strong class="text-color-secondary text-6" data-to="0" data-append="+" data-plugin-options="{'accY': -200}">0</strong>
                                            {{--                                            <span class="text-color-primary font-weight-bold text-4">Business Year</span>--}}
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-light text-3-5 mb-3-5">A structured digital repository for CODECS datasets, offering storing abilities to authorized users and centralized access for all its users to harness the potential of data sources and empower objective decision-making and conflict resolution related to various facets of digitalization.</p>
                                <a {{ (request()->routeIs('inventory_of_datasets')) ? 'class="active"' : '' }} href="{{ route('inventory_of_datasets') }}" class="custom-view-more d-inline-flex font-weight-medium text-color-primary text-decoration-none">
                                    Explore
                                    <img width="27" height="27" loading="lazy" src="{{ asset('img/demos/construction/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute transform3dy-n50 right-0 pe-5 me-4">
                <div class="appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1700" data-appear-animation-duration="750ms">
                    <div class="custom-square-1 bg-primary mb-5"></div>
                </div>
            </div>
            <div class="position-absolute transform3dy-n50 right-15 pe-5 me-5">
                <div class="appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="1500" data-appear-animation-duration="750ms">
                    <div class="custom-square-1 bg-dark pe-5 me-5 mt-4 mb-5"></div>
                </div>
            </div>
        </section>
    </x-slot:main_body>

</x-layout.layout>
