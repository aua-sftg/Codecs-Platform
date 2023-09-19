<div>
    <div class="products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
        @foreach($results as $dataset)
            <div class="column">
                <x-metainventory.dataset-card :keywords="$dataset['keywords']">
                    <x-slot:image>
                        {{ $dataset['image'] }}
                    </x-slot:image>
                    <x-slot:title>
                        {{ $dataset['title']  }}
                    </x-slot:title>
                    <x-slot:source>
                        {{$dataset['source']}}
                    </x-slot:source>
                    <x-slot:date>
                        {{$dataset['update_date']}}
                    </x-slot:date>
                    <x-slot:short_desc>
                        {{$dataset['short_desc']}}
                    </x-slot:short_desc>
                </x-metainventory.dataset-card>

                <div class="col">
                    <hr class="my-4">
                </div>
            </div>
        @endforeach
    </div>
</div>
