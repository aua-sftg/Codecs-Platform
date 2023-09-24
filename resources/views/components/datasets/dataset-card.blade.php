@props(['dataset'])

@php
    $keywords = $dataset['keywords']->map(function($keyword){
        return $keyword->name;
    })->toArray();

@endphp

<x-layout.base-card
    :title="$dataset['name']"
    :keywords="$keywords"
    :exceptr="$dataset['abstract']??$dataset['description']"
    containerClass="dataset"
>

    <x-slot:afterTitle>
        <div class="d-flex gap-5">
            <strong>{{$dataset['status']}}</strong>
            @isset($dataset['organization']['name'])
                <div class="">Creator: {{$dataset['organization']['name']}}</div>
            @endisset
            <em>{{$dataset['created_at']->toDateTimeString()}}</em>
        </div>
    </x-slot:afterTitle>

    <x-slot:actions>
        <a
            href="javascript:void(0)"
            wire:click.prevent="confirm_delete('{{$dataset['id']}}', '{{$dataset['name']}}')"
            class="rounded-pill p-1 px-3 text-white bg-danger me-2"
        >
            <i class="fa fa-trash"></i>
        </a>
        <a href="{{route('datasets.form.edit',$dataset)}}" class="bg-yellow rounded-pill p-1 px-3 fw-bold text-4 text-white">
            {{__('Edit')}}
        </a>
    </x-slot:actions>

</x-layout.base-card>
