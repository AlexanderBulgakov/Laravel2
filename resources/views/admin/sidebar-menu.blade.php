<ul>
    <li>
        <x-nav-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('posts.index')" :active="request()->routeIs('posts*')">{{ __('Posts') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('events.index')" :active="request()->routeIs('events*')">{{ __('Events') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('users.index')" :active="request()->routeIs('users*')">{{ __('Users') }}</x-nav-sidebar-link>
    </li>
    <li>
        <x-nav-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">{{ __('Profile') }}</x-nav-sidebar-link>
    </li>
</ul>