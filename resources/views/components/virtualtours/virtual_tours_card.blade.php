<x-layout.base-card :title="$dataset['name']"
                    :exceptr="$dataset['description']"
                    :country="$dataset['country'] ?? 'N/A'"
                    containerClass="virtual_tour"
                    :image="$image"
                    :link="$dataset['link'] ?? '#'"
>
    <x-slot:afterTitle>
                {{ $dataset['country'] }}
    </x-slot:afterTitle>
</x-layout.base-card>
