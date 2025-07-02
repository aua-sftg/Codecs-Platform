<x-layout.base-card :title="$dataset['name']"
                    :exceptr="$dataset['description']"
                    containerClass="dataset"
                    :image="$image"
                    :keywords="$keywords"
                    :link="route('meta_inventory_ll_detailed', [
                        'meta_inv_title' => $dataset['name'],
                        'meta_inv_id' => $dataset['id']
                    ]) ?? '#'"
>
    <x-slot:afterTitle>
        <div class="flex_row">
            <p class="mb-0"><strong class="text-color-dark">Source:&nbsp;</strong>
               {{ $dataset['llname'] ?? 'N/A' }}
            </p>
            <p class="mb-0 mr_2"><strong class="text-color-dark">Last update:&nbsp;</strong>{{ date('d-m-y', strtotime($dataset['updated_at'])) }}</p>
        </div>
    </x-slot:afterTitle>
</x-layout.base-card>
