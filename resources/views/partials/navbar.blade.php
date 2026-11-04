<nav class="main-navbar">
    <div class="brand">📚 Perpustakaan Digital Kampus</div>

    @auth
        <ul class="nav-menu">
            {{-- Dashboard --}}
            <li>
                <a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    Dashboard
                </a>
            </li>

            {{-- Buku --}}
            <li>
                <a
                    href="{{ route('books.index') }}"
                    class="{{ request()->routeIs('books.*') ? 'active' : '' }}"
                >
                    Buku
                </a>
            </li>

            {{-- Kategori khusus Admin --}}
            @if (auth()->user()->role === 'admin')
                <li>
                    <a
                        href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.*') ? 'active' : '' }}"
                    >
                        Kategori
                    </a>
                </li>
            @endif

            {{-- Anggota --}}
            <li>
                <a
                    href="{{ route('members.index') }}"
                    class="{{ request()->routeIs('members.*') ? 'active' : '' }}"
                >
                    Anggota
                </a>
            </li>

            {{-- Peminjaman --}}
            <li>
                <a
                    href="{{ route('loans.index') }}"
                    class="{{ request()->routeIs('loans.index') || request()->routeIs('loans.create') || request()->routeIs('loans.show') || request()->routeIs('loans.edit') ? 'active' : '' }}"
                >
                    Peminjaman
                </a>
            </li>

            {{-- Laporan --}}
            <li>
                <a
                    href="{{ route('loans.report') }}"
                    class="{{ request()->routeIs('loans.report') ? 'active' : '' }}"
                >
                    Laporan
                </a>
            </li>
        </ul>

        <div class="navbar-user">

            {{-- Profile --}}
            <a
                href="{{ route('profile.show') }}"
                class="profile-link {{ request()->routeIs('profile.*') ? 'active' : '' }}"
            >
                {{ auth()->user()->name }}
                ({{ ucfirst(auth()->user()->role) }})
            </a>

            {{-- Logout --}}
            <form
                action="{{ route('logout') }}"
                method="POST"
                class="inline"
            >
                @csrf

                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>

        </div>
    @endauth

    @guest
        <a
            href="{{ route('login') }}"
            class="{{ request()->routeIs('login') ? 'active' : '' }}"
        >
            Login
        </a>
    @endguest
</nav>
