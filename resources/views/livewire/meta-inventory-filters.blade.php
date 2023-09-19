<div class="col-lg-3 position-relative">
    <aside class="sidebar custom_shadow p-2" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">

        <div class="filters-container">

            <!-- Filter by Source Inventory Dropdown -->
            <div class="filter">
                <div id="source_filter" class="dropdown mt-2">
                    <button class="btn filters_color dropdown-toggle" type="button" id="source-inventory-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Select Source Inventory
                    </button>
                    <div class="dropdown-menu" aria-labelledby="source-inventory-dropdown">
                        <form>
                            @foreach($filterOptions['sources'] as $source)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:click="toggleFilter('{{$source}}','sources')" value="{{$source}}" id="source-{{$source}}">
                                    <label class="form-check-label" for="source-{{$source}}">
                                        {{$source}}
                                    </label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </aside>
</div>
