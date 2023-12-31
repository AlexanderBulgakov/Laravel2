<ul>
    <li>
        <x-nav-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-nav-sidebar-link>
    </li>
    @can('viewByRole', ['post.editor','admin'])
        <li>
            <x-nav-sidebar-link :href="route('posts.index')" :active="request()->routeIs('posts*')">{{ __('Posts') }}</x-nav-sidebar-link>
        </li>
        <li>
            <x-nav-sidebar-link :href="route('categories.index')" :active="request()->routeIs('categories*')">- {{ __('Categories') }}</x-nav-sidebar-link>
        </li>
        <li>
            <x-nav-sidebar-link :href="route('tags.index')" :active="request()->routeIs('tags*')">- {{ __('Tags') }}</x-nav-sidebar-link>
        </li>
    @endcan
    @can('viewByRole', ['event.editor','admin'])
        <li>
            <x-nav-sidebar-link :href="route('events.index')" :active="request()->routeIs('events*')">{{ __('Events') }}</x-nav-sidebar-link>
        </li>
    @endcan
    @can('viewByRole', ['admin'])
        <li>
            <x-nav-sidebar-link :href="route('users.index')" :active="request()->routeIs('users*')">{{ __('Users') }}</x-nav-sidebar-link>
        </li>
    @endcan
    <li>
        <x-nav-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">{{ __('Profile') }}</x-nav-sidebar-link>
    </li>
</ul>