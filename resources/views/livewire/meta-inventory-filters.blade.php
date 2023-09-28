<div class="col-lg-3 position-relative">
    <aside class="sidebar custom_shadow p-4" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">

        <div class="filters-container">
            <!-- Filter by Source Inventory Dropdown -->
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
                                        {{$source['label']}}
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
        $(document).ready(()=>{
            $('#clear-all-button').click(function(){
                let $this = $(this);
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });
            })
        });
    </script>
</div>
