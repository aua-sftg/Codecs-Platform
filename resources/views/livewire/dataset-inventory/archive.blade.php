<div>
    <div class="filters d-flex justify-content-between">
        <select class="form-control" style="width: auto;" name="sort_by" id="">
            <option value="name">Sort by name</option>
            <option value="created_at">Sort by creation date</option>
        </select>

        <a href="#" class="bg-yellow fw-bold fs-6 text-decoration-none p-3 px-3 text-white  rounded-pill">
            <img src="{{asset('img/icons/file_upload.svg')}}" alt="upload dataset icon">Upload new dataset
        </a>
    </div>
    <div class="dataset-archive mt-3">
        @foreach($datasets as $dataset)
            @php
                $keywords = $dataset['keywords']->map(function($keyword){
                    return $keyword->name;
                })->toArray();
            @endphp

            <x-metainventory.dataset-card source="Desira" :keywords="$keywords">
                <x-slot:title>
                    {{ $dataset['name']??'title'  }}
                </x-slot:title>
                <x-slot:source>
                    {{$dataset['source']??'source'}}
                </x-slot:source>
                <x-slot:date>
                    {{$dataset['update_date'??'update_date']}}
                </x-slot:date>
                <x-slot:short_desc>
                    {{$dataset['short_desc']??'short_desc'}}
                </x-slot:short_desc>
            </x-metainventory.dataset-card>
            <br>
        @endforeach
    </div>
</div>
