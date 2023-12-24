<header class="text-white bg-black py-5">
    <div class="container">
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="font-bold text-2xl uppercase"><span
                    class="text-accent">Top</span>Bonus</a>

            <nav class="ml-auto flex gap-8">
                <a class="header__link {{ request()->is('bonuses') ? 'active' : '' }}" href="/bonuses">Bonuses</a>
                <a class="header__link {{ request()->is('casinos') ? 'active' : '' }}"
                    href="{{ route('casinos.index') }}">Casinos</a>
                <a class="header__link {{ request()->is('admin/cities') ? 'active' : '' }}" href="/games">Games</a>
                <a class="header__link {{ request()->is('admin/cities') ? 'active' : '' }}" href="/news">News</a>
                <a class="header__link {{ request()->is('admin/cities') ? 'active' : '' }}" href="/news">Q&A</a>
            </nav>
        </div>
    </div>
</header>
