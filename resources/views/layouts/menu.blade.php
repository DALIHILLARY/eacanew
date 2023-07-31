<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.countries.index') }}" class="nav-link {{ Request::is('admin.countries*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>@lang('models/countries.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.caseTypes.index') }}" class="nav-link {{ Request::is('admin.caseTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>@lang('models/case_types.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.organisations.index') }}" class="nav-link {{ Request::is('admin.organisations*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>@lang('models/organisations.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.caseModels.index') }}" class="nav-link {{ Request::is('admin.caseModels*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-gavel"></i>
        <p>@lang('models/case_models.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.forumCategories.index') }}" class="nav-link {{ Request::is('admin.forumCategories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tags"></i>
        <p>@lang('models/forum_categories.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.forumTopics.index') }}" class="nav-link {{ Request::is('admin.forumTopics*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-comments"></i>
        <p>@lang('models/forum_topics.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.findings.index') }}" class="nav-link {{ Request::is('admin.findings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/findings.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.informationRequests.index') }}" class="nav-link {{ Request::is('admin.informationRequests*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/information_requests.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin.users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/users.plural')</p>
    </a>
</li>
