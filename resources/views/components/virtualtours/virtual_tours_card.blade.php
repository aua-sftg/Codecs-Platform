<x-layout.base-card :title="$dataset['name']"
                    :exceptr="$dataset['description']"
                    :country="$dataset['country'] ?? 'N/A'"
                    containerClass="virtual_tour"
                    :image="$image"
                    :link="'https://example.com'"
>
    <x-slot:afterTitle>
                {{ $dataset['country'] }}
            </p>
        </div>
    </x-slot:afterTitle>
</x-layout.base-card>
