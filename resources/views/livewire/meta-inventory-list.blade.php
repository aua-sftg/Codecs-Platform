<div>
    <div class="products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
        @foreach($paginatedResults->items()  as $dataset)
            <div class="column">
                <x-metainventory.meta_inventory_card :dataset="$dataset">

                </x-metainventory.meta_inventory_card>

                <div class="col">
                    <hr class="my-4">
                </div>
            </div>
        @endforeach
    </div>
    <nav aria-label="Page navigation example" class="my-5">
        <ul class="pagination justify-content-center">
            @if ($paginatedResults->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" role="button" wire:click="gotoPage(1)">First</a>
                </li>
                <li class="page-item">
                    <a class="page-link" role="button" wire:click="previousPage" tabindex="-1">Previous</a>
                </li>
            @endif
                @for ($page = $startPage; $page <= $endPage; $page++)
                    <li class="page-item {{ $page == $paginatedResults->currentPage() ? 'active' : '' }}">
                        <a class="page-link" role="button" wire:click="gotoPage({{ $page }})" >{{ $page }}</a>
                    </li>
                @endfor

            @if ($paginatedResults->hasMorePages())
                <li class="page-item">
                    <a class="page-link" role="button" wire:click="nextPage" >Next</a>
                </li>
                <li class="page-item">
                    <a class="page-link" role="button"  wire:click="gotoPage({{ $paginatedResults->lastPage() }})" href="#">Last</a>
                </li>
            @endif
        </ul>
    </nav>
</div>
