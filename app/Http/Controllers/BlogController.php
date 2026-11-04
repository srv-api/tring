<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{

    private function getArticles(): array
    {
        return [
            [
                'slug' => 'mengenal-tring-pocket-manager',
                'title' => 'Mengenal Tring: Pocket Manager untuk Aktivitas Sehari-hari',
                'excerpt' => 'Tring hadir sebagai partner digital yang membantu aktivitas harian jadi lebih praktis dalam satu genggaman.',
                'category' => 'Product',
                'author' => 'Tim Tring',
                'date' => '2025-11-18',
                'read_time' => '5 menit',
                'cover' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1200&q=80',
                'content' => '<p>Di era digital seperti sekarang, kita membutuhkan satu aplikasi yang bisa menampung berbagai kebutuhan sehari-hari. <strong>Tring</strong> hadir sebagai solusi...</p>
                              <h2>Kenapa Tring?</h2>
                              <p>Tring dirancang untuk membuat aktivitas lebih sederhana, cepat, dan terorganisir. Semua fitur dalam satu genggaman.</p>
                              <h2>Fitur Utama</h2>
                              <ul><li>Dompet digital</li><li>Manajemen aktivitas</li><li>Pembayaran praktis</li></ul>
                              <blockquote>Praktis, mudah digunakan, dan dalam satu aplikasi.</blockquote>
                              <p>Mulai gunakan Tring hari ini dan rasakan bedanya.</p>',
            ],
            [
                'slug' => 'tips-manajemen-keuangan-digital',
                'title' => '5 Tips Manajemen Keuangan Digital yang Efektif',
                'excerpt' => 'Kelola keuangan digital lebih rapi dengan strategi sederhana yang bisa diterapkan langsung dari smartphone kamu.',
                'category' => 'Tips',
                'author' => 'Nadia Putri',
                'date' => '2025-11-12',
                'read_time' => '7 menit',
                'cover' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80',
                'content' => '<p>Keuangan digital memudahkan hidup, tapi juga menuntut disiplin.</p>
                              <h2>1. Catat Setiap Transaksi</h2>
                              <p>Tanpa pencatatan, pengeluaran kecil akan terasa besar di akhir bulan.</p>
                              <h2>2. Gunakan Budget Bulanan</h2>
                              <p>Tentukan batas pengeluaran per kategori.</p>
                              <h2>3. Pisahkan Rekening</h2>
                              <p>Gunakan dompet digital untuk kebutuhan harian saja.</p>',
            ],
            [
                'slug' => 'keamanan-transaksi-digital',
                'title' => 'Memahami Keamanan Transaksi Digital di Aplikasi Modern',
                'excerpt' => 'Bagaimana aplikasi seperti Tring menjaga keamanan transaksi? Ini penjelasan sederhana tentang teknologi di baliknya.',
                'category' => 'Keamanan',
                'author' => 'Tim Tring',
                'date' => '2025-11-05',
                'read_time' => '6 menit',
                'cover' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1200&q=80',
                'content' => '<p>Keamanan adalah fondasi setiap aplikasi keuangan digital.</p>
                              <h2>Enkripsi End-to-End</h2>
                              <p>Data kamu dienkripsi saat dikirim dan disimpan.</p>
                              <h2>Autentikasi Berlapis</h2>
                              <p>PIN, biometrik, dan OTP memberikan lapisan perlindungan tambahan.</p>',
            ],
            [
                'slug' => 'tring-untuk-umkm',
                'title' => 'Bagaimana Tring Membantu Pelaku UMKM Berkembang',
                'excerpt' => 'UMKM kini bisa memanfaatkan Tring untuk menerima pembayaran dan mengelola keuangan usaha dengan lebih rapi.',
                'category' => 'Bisnis',
                'author' => 'Budi Santoso',
                'date' => '2025-10-28',
                'read_time' => '8 menit',
                'cover' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1200&q=80',
                'content' => '<p>UMKM adalah tulang punggung ekonomi Indonesia.</p>
                              <h2>Pembayaran Mudah</h2>
                              <p>Terima pembayaran dari mana saja tanpa perlu mesin EDC mahal.</p>
                              <h2>Laporan Sederhana</h2>
                              <p>Pantau arus kas usaha dengan mudah.</p>',
            ],
            [
                'slug' => 'gaya-hidup-cashless',
                'title' => 'Gaya Hidup Cashless: Lebih Praktis atau Berisiko?',
                'excerpt' => 'Membahas pro dan kontra gaya hidup tanpa uang tunai, serta bagaimana menyikapinya dengan bijak.',
                'category' => 'Lifestyle',
                'author' => 'Nadia Putri',
                'date' => '2025-10-20',
                'read_time' => '5 menit',
                'cover' => 'https://images.unsplash.com/photo-1556742111-a301076d9d18?w=1200&q=80',
                'content' => '<p>Cashless society bukan sekadar tren, tapi arah masa depan.</p>
                              <h2>Kelebihan</h2>
                              <p>Praktis, cepat, dan tercatat otomatis.</p>
                              <h2>Kekurangan</h2>
                              <p>Kurangnya kontrol bisa membuat pengeluaran membengkak.</p>',
            ],
            [
                'slug' => 'roadmap-tring-2026',
                'title' => 'Roadmap Tring 2026: Fitur Apa Saja yang Akan Hadir?',
                'excerpt' => 'Intip rencana pengembangan Tring di tahun 2026, dari fitur baru hingga peningkatan pengalaman pengguna.',
                'category' => 'Product',
                'author' => 'Tim Tring',
                'date' => '2025-10-10',
                'read_time' => '4 menit',
                'cover' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80',
                'content' => '<p>Kami terus berinovasi untuk kamu.</p>
                              <h2>Fitur Baru</h2>
                              <p>Integrasi dengan layanan publik, notifikasi pintar, dan banyak lagi.</p>
                              <h2>Peningkatan UX</h2>
                              <p>Desain lebih bersih dan navigasi lebih cepat.</p>',
            ],
        ];
    }

    public function index(Request $request)
    {
        $articles = $this->getArticles();

        // Filter by category (opsional)
        $activeCategory = $request->query('category', 'Semua');
        if ($activeCategory !== 'Semua') {
            $articles = array_values(array_filter($articles, function ($a) use ($activeCategory) {
                return $a['category'] === $activeCategory;
            }));
        }

        $categories = ['Semua', 'Product', 'Tips', 'Keamanan', 'Bisnis', 'Lifestyle'];

        return view('blog.index', compact('articles', 'categories', 'activeCategory'));
    }

    public function show(string $slug)
    {
        $articles = $this->getArticles();
        $article = collect($articles)->firstWhere('slug', $slug);

        abort_if(!$article, 404);

        // Related articles (exclude current, ambil 3)
        $related = collect($articles)
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values()
            ->all();

        return view('blog.show', compact('article', 'related'));
    }
}