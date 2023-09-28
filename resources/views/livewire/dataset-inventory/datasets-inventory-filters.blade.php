<div class="col-lg-3 position-relative">
    <aside class="sidebar custom_shadow p-4" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">

        <div class="filters-container">
            @foreach($filterOptions as $key => $options)
                <div class="filter">
                    <div id="{{ $key }}_filter" class="dropdown mt-2">
                        <button class="btn filters_color dropdown-toggle w-100" type="button" id="{{ $key }}-inventory-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            Select {{ ucfirst($key) }}
                        </button>
                        <div class="dropdown-menu filter_height w-100" aria-labelledby="{{ $key }}-inventory-dropdown">
                            <form>
                                @foreach($options as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:click="toggleFilter('{{$option}}','{{$key}}')" value="{{$option}}" id="{{ ucfirst($key) }}-{{$option}}">
                                        <label class="form-check-label" for="{{ ucfirst($key) }}-{{$option}}">
                                            {{$option}}
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
