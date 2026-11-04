{{-- Sidebar blog — reusable untuk list & detail --}}
<aside class="blog-sidebar">

    {{-- SEARCH --}}
    <div class="sidebar-card">
        <h3 class="sidebar-title">
            <i class="bi bi-search"></i>
            Cari Artikel
        </h3>
        <form action="{{ route('blog.index') }}" method="GET" class="sidebar-search">
            <input type="text"
                   name="q"
                   placeholder="Cari artikel..."
                   value="{{ request('q') }}"
                   aria-label="Cari artikel">
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
            @foreach (($categories ?? ['Semua', 'Product', 'Tips', 'Keamanan', 'Bisnis', 'Lifestyle']) as $cat)
                <li>
                    <a href="{{ route('blog.index', $cat === 'Semua' ? [] : ['category' => $cat]) }}"
                       class="{{ ($activeCategory ?? 'Semua') === $cat ? 'is-active' : '' }}">
                        <span>{{ $cat }}</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- ARTIKEL POPULER --}}
    @if (!empty($popular))
        <div class="sidebar-card">
            <h3 class="sidebar-title">
                <i class="bi bi-fire"></i>
                Artikel Populer
            </h3>
            <div class="sidebar-popular">
                @foreach ($popular as $pop)
                    <a href="{{ route('blog.show', $pop['slug']) }}" class="popular-item">
                        <div class="popular-thumb">
                            <img src="{{ $pop['cover'] }}" alt="{{ $pop['title'] }}" loading="lazy">
                        </div>
                        <div class="popular-info">
                            <div class="popular-title">{{ $pop['title'] }}</div>
                            <div class="popular-meta">
                                <i class="bi bi-calendar3"></i>
                                {{ \Carbon\Carbon::parse($pop['date'])->translatedFormat('d M Y') }}
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
        <p>Kelola aktivitas harian dalam satu aplikasi.</p>
        <a href="{{ url('/#download') }}" class="sidebar-cta-btn">
            Download App
            <i class="bi bi-arrow-right"></i>
        </a>
    </div>

</aside>