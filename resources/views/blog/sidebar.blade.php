
{{-- Sidebar blog — reusable untuk list & detail --}}
<aside class="blog-sidebar">

    {{-- SEARCH --}}
    <div class="sidebar-card">
        <h3 class="sidebar-title">
            <i class="bi bi-search"></i>
            Cari Artikel
        </h3>

        <form action="{{ route('blog.index') }}" method="GET" class="sidebar-search">
            <input
                type="text"
                name="q"
                placeholder="Cari artikel..."
                value="{{ request('q') }}"
                aria-label="Cari artikel"
            >

            <button type="submit" aria-label="Cari">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    {{-- KATEGORI --}}
    <div class="sidebar-card">
        <h3 class="sidebar-title">
            <i class="bi bi-tags"></i>
            Kategori
        </h3>

        <ul class="sidebar-list">

            <li>
                <a
                    href="{{ route('blog.index') }}"
                    class="{{ ($activeCategory ?? 'Semua') === 'Semua' ? 'is-active' : '' }}"
                >
                    <span>Semua Artikel</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>

            @foreach ($categories as $cat)
                <li>
                    <a
                        href="{{ route('blog.index', ['category' => $cat->slug]) }}"
                        class="{{ ($activeCategory ?? '') === $cat->slug ? 'is-active' : '' }}"
                    >
                        <span>{{ $cat->name }}</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>

    {{-- ARTIKEL TERBARU --}}
    @if (isset($popular) && $popular->isNotEmpty())
        <div class="sidebar-card">

            <h3 class="sidebar-title">
                <i class="bi bi-clock-history"></i>
                Artikel Terbaru
            </h3>

            <div class="sidebar-popular">

                @foreach ($popular as $pop)
                    <a
                        href="{{ route('blog.show', $pop->slug) }}"
                        class="popular-item"
                    >
                        <div class="popular-thumb">

                            @if ($pop->thumbnail)
                                <img
                                    src="{{ asset('storage/' . $pop->thumbnail) }}"
                                    alt="{{ $pop->title }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="popular-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif

                        </div>

                        <div class="popular-info">

                            <div class="popular-title">
                                {{ $pop->title }}
                            </div>

                            <div class="popular-meta">
                                <i class="bi bi-calendar3"></i>

                                @if ($pop->published_at)
                                    {{ $pop->published_at->translatedFormat('d M Y') }}
                                @else
                                    -
                                @endif
                            </div>

                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    @endif

    {{-- CTA DOWNLOAD --}}
    <div class="sidebar-card sidebar-cta">

        <div class="cta-icon">
            <i class="bi bi-stars"></i>
        </div>

        <h3>Download Tring</h3>

        <p>
            Kelola aktivitas harian dalam satu aplikasi.
        </p>

        <a href="{{ url('/#download') }}" class="sidebar-cta-btn">
            Download App
            <i class="bi bi-arrow-right"></i>
        </a>

    </div>

</aside>
