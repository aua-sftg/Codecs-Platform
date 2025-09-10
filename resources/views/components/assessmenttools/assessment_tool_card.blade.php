<x-layout.base-card :title="$dataset['name']"
                    :exceptr="$dataset['description']"
                    :country="$dataset['country'] ?? 'N/A'"
                    containerClass="assessment_tool"
                    :image="$image"
                    :fileUrl="$fileUrl"
                    :link="route('assessment_tool_detailed', [
                        'tool_slug' => $dataset['slug'],
                        'tool_inv_id' => $dataset['_id']
                    ]) ?? '#'"
>
    <x-slot:afterTitle>
                {{ $dataset['country'] }}
            </p>
        </div>
    </x-slot:afterTitle>
</x-layout.base-card>
