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
        <x-nav-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">{{ __('Profile') }}</x-nav-sidebar-link>
    </li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-nav-sidebar-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Log Out') }}</x-nav-sidebar-link>
        </form>
    </li>
</ul>