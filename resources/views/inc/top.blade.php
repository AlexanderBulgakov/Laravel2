@if (Route::has('login'))
    <div class="py-4 bg-blue-800 shadow">
        <div class="container mx-auto flex flex-wrap items-center justify-end">
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                @auth
                    <li><x-top-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-top-link></li>
                    <li><x-top-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">{{ __('Profile') }}</x-top-link></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-top-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Log Out') }}</x-top-link>
                        </form>
                    </li>
                @else
                    <li><x-top-link :href="route('login')" :active="request()->routeIs('login')">{{ __('Log in') }}</x-top-link></li>

                    @if (Route::has('register'))
                        <li><x-top-link :href="route('register')" :active="request()->routeIs('register')">{{ __('Register') }}</x-top-link></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
@endif