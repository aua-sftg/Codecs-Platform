<div class="card-list-container">
    @forelse($favorites as $favorite)
        @if($favorite['vendor']==='datasets')
            <x-datasets.dataset-card :dataset="$favorite" :show-actions="false"></x-datasets.dataset-card>
        @else
            <x-metainventory.meta_inventory_card :dataset="$favorite"></x-metainventory.meta_inventory_card>
        @endif
    @empty
        <div class="alert alert-info">
            <p class="mb-0">You have no favorites yet.</p>
        </div>
    @endforelse
</div>
