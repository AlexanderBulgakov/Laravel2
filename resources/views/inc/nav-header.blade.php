<nav class="py-4 border-t border-b bg-gray-100">
    <div class="flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
        <x-nav-header-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-nav-header-link>
        <x-nav-header-link :href="route('blog')" :active="request()->routeIs('blog*') || request()->routeIs('category.show')">{{ __('Blog') }}</x-nav-header-link>
        <x-nav-header-link :href="route('calendar')" :active="request()->routeIs('calendar')">{{ __('Calendar') }}</x-nav-header-link>
        <x-nav-header-link :href="route('about')" :active="request()->routeIs('about')">{{ __('About') }}</x-nav-header-link>
        <x-nav-header-link :href="route('contact')" :active="request()->routeIs('contact')">{{ __('Contact') }}</x-nav-header-link>
    </div>
</nav>