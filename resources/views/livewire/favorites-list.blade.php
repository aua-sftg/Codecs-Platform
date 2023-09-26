<div class="card-list-container">
    @forelse($favorites as $favorite)
        <x-metainventory.meta_inventory_card :dataset="$favorite"></x-metainventory.meta_inventory_card>
    @empty
        <div class="alert alert-info">
            <p class="mb-0">You have no favorites yet.</p>
        </div>
    @endforelse
</div>
