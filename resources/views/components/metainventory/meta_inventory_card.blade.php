<x-layout.base-card :title="$dataset['title']"
                    :keywords="$dataset['keywords']"
                    :exceptr="$dataset['short_desc']"
                    :containerClass="$dataset['vendor']"
                    :image="$dataset['image']"
                    :link="route('meta_inventory_detailed', [
                        'meta_inv_title' => $dataset['title'],
                        'meta_inv_id' => $dataset['id'],
                        'meta_inv_source' => $dataset['vendor']
                    ]) ?? '#'"
>
    <x-slot:afterTitle>
        <div class="flex_row">
            <p class="mb-0"><strong class="text-color-dark">Source:&nbsp;</strong>
                {{$dataset['source']}}
            </p>
            <p class="mb-0 mr_2"><strong class="text-color-dark">Last update:&nbsp;</strong>{{ date('d-m-y', strtotime($dataset['update_date'])) }}</p>
        </div>
    </x-slot:afterTitle>
</x-layout.base-card>
