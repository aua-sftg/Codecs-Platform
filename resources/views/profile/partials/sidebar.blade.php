<section class="position-sticky" style="top:120px;">


    @foreach(\App\Logic\LinkList::profile_sidebar() as $link)
        <a href="{{route($link['route'])}}"
           @class([
               'd-flex align-items-center gap-3 m-0 p-2',
               'selected-link' => request()->routeIs($link['route']),
               'mt-3'=>!$loop->first
           ])
           >
            <img alt="{{$link['label']}} menu item icon" loading="lazy" src="{{$link['icon']}}"/>
            <h4 class="m-0">{{$link['label']}}</h4>
        </a>
    @endforeach

    <form action="{{route('logout')}}" method="post">
        @csrf
        @method('POST')
        <button  class="d-flex btn align-items-center gap-3 m-0 mt-3 p-2">
            <img src="{{asset('img/icons/logout.svg')}}"/>
            <h4 class="m-0">{{__('Logout')}}</h4>
        </button>
    </form>


</section>
