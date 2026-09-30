<div class="input-group mb-5 pb-1">
    <input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text" wire:model="searchTerm" wire:keydown.enter="search">
    <button wire:click="search" type="submit" class="btn orange_color_btn  text-1 p-2"><i class="fas fa-search m-2"></i></button>
    <button wire:click="clearSearch" class="btn orange_color_btn  ml_2" type="button">Clear</button>
</div>
