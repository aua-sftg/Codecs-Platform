@extends(backpack_view('blank'))

@php

    $content = [];
    foreach(\App\Logic\MetaInventory::statistics() as $vendor=>$counter)
    {
        $content[]=[
             'type'        => 'progress',
                'class'       => 'card text-white bg-primary mb-2 p-2',
                'value'       => $counter.' '.$vendor.' records',
                'progress'    => 100,
        ];
    }

    $content[] = [
        'type'        => 'progress',
        'class'       => 'card text-white bg-primary mb-2 p-2',
        'value'       => \App\Models\Dataset::count().' datasets',
        'progress'    => 100,
    ];

    $widgets['after_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => $content
    ];

    $widgets['after_content'][] = [
        'type'    => 'div',
        'class'   => 'row mt-2',
        'content' => [
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-success text-black mt-3 p-2',
                'value'       => \App\Models\Scenario::count().' scenarios',
                'progress'    => 100,
            ],[
                'type'        => 'progress',
                'class'       => 'card text-white bg-success text-black mt-3 p-2',
                'value'       => \App\Models\Sector::count().' sectors',
                'progress'    => 100,
            ],[
                'type'        => 'progress',
                'class'       => 'card text-white bg-success text-black mt-3 p-2',
                'value'       => \App\Models\Keyword::count().' keywords',
                'progress'    => 100,
            ],
        ]
    ];

@endphp

@section('content')
    <div class="">
        <h2 class="title">CODECS overview</h2>
    </div>
@endsection

@push('after_scripts')

@endpush
