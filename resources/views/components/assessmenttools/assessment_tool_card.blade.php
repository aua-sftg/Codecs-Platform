<x-layout.base-card :title="$dataset['name']"
                    :exceptr="$dataset['description']"
                    containerClass="dataset"
                    :image="$image"
                    :fileUrl="$fileUrl"
>
    <x-slot:afterTitle>
        <div class="flex_row">
            <p class="mb-0"><strong class="text-color-dark">Creator:&nbsp;</strong>
                @if (!empty($dataset['organization']['link']))
                    <a href="{{ $dataset['organization']['link'] }}" target="_blank">{{ $dataset['organization']['name'] }}</a>
                @else
                    {{ $dataset['organization']['name'] ?? 'N/A' }}
                @endif
            </p>
            <p class="mb-0 mr_2"><strong class="text-color-dark">Last update:&nbsp;</strong>{{ date('d-m-y', strtotime($dataset['updated_at'])) }}</p>
        </div>
    </x-slot:afterTitle>
</x-layout.base-card>
