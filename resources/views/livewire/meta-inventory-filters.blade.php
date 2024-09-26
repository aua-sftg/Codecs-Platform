<div class="col-lg-3 position-relative" wire:ignore>
    <aside class="sidebar custom_shadow p-4" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">

        <div class="filters-container">
            <!-- Filter by Source Inventory Dropdown -->
            <div>
                <p id="totalCount"> {{$totalCount}} results found</p>
            </div>
            <div class="filter">
                <div id="source_filter" class="dropdown mt-2">
                    <button class="btn filters_color dropdown-toggle w-100" type="button" id="source-inventory-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Select Source Inventory
                    </button>
                    <div class="filter_height dropdown-menu w-100" aria-labelledby="source-inventory-dropdown">
                        <form>
                            @foreach($filterOptions['sources'] as $source)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:click="toggleFilter('{{$source['value']}}','sources')" value="{{$source['value']}}" id="source-{{$source['value']}}">
                                    <label class="form-check-label" for="source-{{$source['value']}}">
                                        @if($source['label'] === 'Desira')
                                            DESIRA
                                        @elseif($source['label'] === 'Fairshare')
                                            FAIRshare
                                        @elseif($source['label'] === 'Nutricheck')
                                            NUTRI-CHECK NET
                                        @elseif($source['label'] === 'IPMWorks')
                                            IPMworks
                                        @else
                                            {{$source['label']}}
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="filter">
                <div id="country_filter" class="dropdown mt-2">
                    <button class="btn filters_color dropdown-toggle w-100" type="button" id="country-inventory-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Select Country
                    </button>
                    <div class="dropdown-menu filter_height w-100" aria-labelledby="country-inventory-dropdown">
                        <form>
                            @foreach($filterOptions['countries'] as $country)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:click="toggleFilter('{{$country}}','countries')" value="{{$country}}" id="Country-{{$country}}">
                                    <label class="form-check-label" for="Country-{{$country}}">
                                        {{$country}}
                                    </label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="filter">
                <button id="clear-all-button" class="btn orange_color_btn mt-4" wire:click="clearFilters">Clear All</button>
            </div>
        </div>
    </aside>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('updateTotalCount', event => {
                // console.log("Event: ", event);
                document.getElementById('totalCount').innerText = event.detail.totalCount + ' results found';
            });

            window.addEventListener('clear-checkboxes', () => {
                // console.log("clear-checkboxes event received");
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });
            });

            // Detect when the page is loaded via the back button
            window.addEventListener('pageshow', function (event) {
                if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                    @this.call('clearFilters');
                }
            });
        });
    </script>
</div>