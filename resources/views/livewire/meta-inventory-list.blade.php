<div>
    <div class="products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
        @foreach($results as $dataset)
            <div class="column">
                <x-metainventory.meta_inventory_card :dataset="$dataset">

                </x-metainventory.meta_inventory_card>

                <div class="col">
                    <hr class="my-4">
                </div>
            </div>
        @endforeach
    </div>
</div>
