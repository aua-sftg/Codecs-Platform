{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>


@if(Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_ADMIN_PERMISSIONS))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user-alt"></i> Users</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('pages') }}"><i class="nav-icon la la-file"></i> Pages</a></li>
@endif


@if(\Illuminate\Support\Facades\Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_MANAGE_SCENARIOS))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('scenario') }}"><i class="nav-icon la la-scroll"></i> Scenarios</a></li>
@endif

@if(\Illuminate\Support\Facades\Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_UPLOAD_DATASETS))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dataset') }}"><i class="nav-icon la la-database"></i> Datasets</a></li>
@endif

@if(\Illuminate\Support\Facades\Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_MANAGE_ASSESSMENTOOLS))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('assessment-tool') }}"><i class="nav-icon la la-question"></i> Assessment tools</a></li>
@endif

@if(\Illuminate\Support\Facades\Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_MANAGE_VIRTUALTOURS))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('virtual-tour') }}"><i class="nav-icon la la-eye"></i> Virtual Tours</a></li>
@endif

@if(\Illuminate\Support\Facades\Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_MANAGE_LLDATASETS))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('ll-dataset') }}"><i class="nav-icon la la-question"></i> LL Datasets</a></li>
@endif

@if(\Illuminate\Support\Facades\Gate::forUser(backpack_user())->allows(\App\Logic\PermissionHelper::PERMISSION_ADMIN_PERMISSIONS))
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-gear"></i> Dataset lists</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('audience') }}"><i class="nav-icon la la-bullseye"></i> Audiences</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('data-format') }}"><i class="nav-icon la la-file-video"></i> Data formats</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('organization') }}"><i class="nav-icon la la-university"></i> Organizations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('sector') }}"><i class="nav-icon la la-code-branch"></i> Sectors</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('keyword') }}"><i class="nav-icon la la-tags"></i> Keywords</a></li>
    </ul>
</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-shield-alt"></i> Permissions</a></li>
@endif

