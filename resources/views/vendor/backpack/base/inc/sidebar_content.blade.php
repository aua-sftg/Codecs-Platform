{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>--}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('scenario') }}"><i class="nav-icon la la-scroll"></i> Scenarios</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dataset') }}"><i class="nav-icon la la-database"></i> Datasets</a></li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Dataset lists</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('audience') }}"><i class="nav-icon la la-bullseye"></i> Audiences</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('data-format') }}"><i class="nav-icon la la-tags"></i> Data formats</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('organization') }}"><i class="nav-icon la la-university"></i> Organizations</a></li>
    </ul>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('sector') }}"><i class="nav-icon la la-question"></i> Sectors</a></li>