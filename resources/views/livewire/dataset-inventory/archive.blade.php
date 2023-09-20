<div>
    <div class="filters d-flex justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <select name="sort_by" wire:model="sort_by" class="form-control" style="width: auto;"  id="sort_by_select">
                <option value="name">{{__('Sort by name')}}</option>
                <option value="created_at">{{__('Sort by creation date')}}</option>
            </select>
            <div wire:loading>
                <i class="fa fa-2x fa-spinner fa-spin"></i>
            </div>
        </div>

        <a href="#" class="bg-yellow fw-bold fs-6 text-decoration-none p-3 px-3 text-white  rounded-pill">
            <img src="{{asset('img/icons/file_upload.svg')}}" alt="upload dataset icon">Upload new dataset
        </a>
    </div>
    <div class="dataset-archive mt-3">
        @foreach($datasets as $dataset)
            <x-datasets.dataset-card :dataset="$dataset"></x-datasets.dataset-card>
        @endforeach
    </div>
</div>
