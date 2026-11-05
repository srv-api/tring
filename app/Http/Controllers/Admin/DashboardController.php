<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles' => Schema::hasTable('articles')
                ? DB::table('articles')->count()
                : 0,

            'published_articles' => Schema::hasTable('articles')
                ? DB::table('articles')->where('status', 'published')->count()
                : 0,

            'pages' => Schema::hasTable('pages')
                ? DB::table('pages')->count()
                : 0,

            'users' => Schema::hasTable('users')
                ? DB::table('users')->count()
                : 0,

            'categories' => Schema::hasTable('categories')
                ? DB::table('categories')->count()
                : 0,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
