<section class="position-sticky" style="top:120px;">
    <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-3 m-0 p-2 selected-link">
        <img src="{{asset('img/icons/account_circle.svg')}}"/>
        <h4 class="m-0">{{__('My Profile')}}</h4>
    </a>

    <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-3 m-0 p-2 mt-3 ">
        <img src="{{asset('img/icons/account_circle.svg')}}"/>
        <h4 class="m-0">{{__('My Uploads')}}</h4>
    </a>

    <a href="{{route('profile.edit')}}" class="d-flex align-items-center gap-3 m-0 p-2  mt-3">
        <img src="{{asset('img/icons/account_circle.svg')}}"/>
        <h4 class="m-0">{{__('My Favorites')}}</h4>
    </a>

    <form action="{{route('logout')}}" method="post">
        @csrf
        @method('POST')
        <button  class="d-flex btn align-items-center gap-3 m-0 mt-3 p-2">
            <img src="{{asset('img/icons/logout.svg')}}"/>
            <h4 class="m-0">{{__('Logout')}}</h4>
        </button>
    </form>


</section>
