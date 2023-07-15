<footer class="border-t pb-12">
    <div class="flex flex-col sm:flex-row items-center justify-center text-sm py-6">
        <x-nav-footer-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-nav-footer-link>
        <x-nav-footer-link :href="route('blog')" :active="request()->routeIs('blog*') || request()->routeIs('category.show')">{{ __('Blog') }}</x-nav-footer-link>
        <x-nav-footer-link :href="route('about')" :active="request()->routeIs('about')">{{ __('About') }}</x-nav-footer-link>
        <x-nav-footer-link :href="route('contact')" :active="request()->routeIs('contact')">{{ __('Contact') }}</x-nav-footer-link>
    </div>
    <div class="uppercase text-sm text-center mb-6">&copy; {{ config('app.name', 'Simple Blog') }}</div>
</footer>