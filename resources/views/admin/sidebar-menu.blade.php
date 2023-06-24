<ul>
    <li>
        <x-nav-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">{{ __('Posts') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">- {{ __('Add new post') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('users.index')" :active="request()->routeIs('users.index')">{{ __('Users') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('users.create')" :active="request()->routeIs('users.create')">- {{ __('Add new user') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">{{ __('Profile') }}</x-nav-sidebar-link>
    </li>
</ul>