<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.countries.index') }}" class="nav-link {{ Request::is('admin/countries*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>@lang('models/countries.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.caseTypes.index') }}"
        class="nav-link {{ Request::is('admin/case-types*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>@lang('models/case_types.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.organisations.index') }}"
        class="nav-link {{ Request::is('admin/organisations*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>@lang('models/organisations.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.caseModels.index') }}"
        class="nav-link {{ Request::is('admin/case-models*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-gavel"></i>
        <p>@lang('models/case_models.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.forumCategories.index') }}"
        class="nav-link {{ Request::is('admin/forum-categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tags"></i>
        <p>@lang('models/forum_categories.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.forumTopics.index') }}"
        class="nav-link {{ Request::is('admin/forum-topics*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-comments"></i>
        <p>@lang('models/forum_topics.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.mailBox.index') }}" class="nav-link {{ Request::is('admin/mail*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>@lang('models/mail.plural')</p>
    </a>

</li>

<li class="nav-item">
    <a href="{{ route('admin.findings.index') }}"
        class="nav-link {{ Request::is('admin/findings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-search"></i>
        <p>@lang('models/findings.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.informationRequests.index') }}"
        class="nav-link {{ Request::is('admin/information-requests*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-info"></i>
        <p>@lang('models/information_requests.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>@lang('models/users.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.tags.index') }}" class="nav-link {{ Request::is('admin/tags*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-thumbtack"></i>
        <p>@lang('models/tags.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('admin/news-posts*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            Content
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ route('admin.newsPosts.index') }}"
                class="nav-link {{ Request::is('admin/news-posts*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>@lang('models/news_posts.plural')</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.events.index') }}"
                class="nav-link {{ Request::is('admin/events*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>@lang('models/events.plural')</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.publications.index') }}"
                class="nav-link {{ Request::is('admin/publications*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-scroll"></i>
                <p>@lang('models/publications.plural')</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.blogPosts.index') }}"
                class="nav-link {{ Request::is('admin/blog-posts*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-blog"></i>
                <p>@lang('models/blog_posts.plural')</p>
            </a>
        </li>
        <li class="nav-item">
          
        </li>
    </ul>
</li>
</li>

<li class="nav-item">
    <a href="{{ route('profiles.index') }}" class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/profiles.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.profiles.index') }}" class="nav-link {{ Request::is('admin.profiles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/profiles.plural')</p>
    </a>
</li>
