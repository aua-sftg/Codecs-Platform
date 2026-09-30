<div>
    <div class="filters d-flex justify-content-between flex-column flex-md-row ">
        <div class="d-flex align-items-center gap-3">
            <select name="sort_by" wire:model="sort_by" class="form-control" style="width: auto;"  id="sort_by_select">
                <option value="name">{{__('Sort by name')}}</option>
                <option value="created_at">{{__('Sort by creation date')}}</option>
            </select>

            <select name="status" wire:model="status" class="form-control" style="width: auto;"  id="sort_by_select">
                <option value="">Any status</option>
                @foreach(\App\Logic\Status::STATUS_LABELS_ARRAY as $key=>$label)
                    <option value="{{$key}}">{{$label}}</option>
                @endforeach
            </select>
            <div wire:loading>
                <i class="fa fa-2x fa-spinner fa-spin"></i>
            </div>
        </div>

        <a href="{{route('datasets.form')}}" class="bg-yellow fw-bold fs-6 text-decoration-none p-1 px-3 my-3 my-md-0 text-white rounded-pill">
            <img src="{{asset('img/icons/file_upload.svg')}}" alt="upload dataset icon"> Upload new dataset
        </a>
    </div>
    <div class="dataset-archive mt-3 card-list-container">
        @foreach($datasets as $dataset)
            <x-datasets.dataset-card :dataset="$dataset"></x-datasets.dataset-card>
        @endforeach
    </div>


    <div wire:ignore.self class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-5">
                <div class="modal-body text-center">
                    <strong>Are you sure you want to delete  dataset </strong>
                    <div class="my-4">
                        <em>
                            {{$deleteName}}
                        </em>
                    </div>
                    <button wire:click="cancel_delete" type="button" class="btn btn-default">Cancel</button>
                    <button wire:click="perform_delete" type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('show-delete-modal', event => {
            $('#myModal').modal('show');
        })

        window.addEventListener('hide-delete-modal', event => {
            $('#myModal').modal('hide');
        })
    </script>

</div>
