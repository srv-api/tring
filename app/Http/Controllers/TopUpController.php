<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function index()
    {
        $games = [
            [
                'id' => 'mobile-legends',
                'name' => 'Mobile Legends',
                'category' => 'MOBA',
                'image' => asset('images/games/ml.webp'),
                'color' => '#5B61D6',
                'description' => 'Mobile Legends: Bang Bang',
            ],
            [
                'id' => 'free-fire',
                'name' => 'Free Fire',
                'category' => 'Battle Royale',
                'icon' => '🔥',
                'color' => '#F97316',
                'description' => 'Garena Free Fire',
            ],
            [
                'id' => 'pubg-mobile',
                'name' => 'PUBG Mobile',
                'category' => 'Battle Royale',
                'icon' => '🎯',
                'color' => '#D4A017',
                'description' => 'PUBG Mobile',
            ],
            [
                'id' => 'honor-of-kings',
                'name' => 'Honor of Kings',
                'category' => 'MOBA',
                'icon' => '👑',
                'color' => '#2563EB',
                'description' => 'Honor of Kings',
            ],
            [
                'id' => 'genshin-impact',
                'name' => 'Genshin Impact',
                'category' => 'RPG',
                'icon' => '✨',
                'color' => '#0EA5E9',
                'description' => 'Genshin Impact',
            ],
            [
                'id' => 'valorant',
                'name' => 'Valorant',
                'category' => 'FPS',
                'icon' => '⚡',
                'color' => '#E11D48',
                'description' => 'Valorant',
            ],
        ];

        return view('topup.index', compact('games'));
    }

    public function show(string $game)
{
    $games = [
        'mobile-legends' => [
            'name' => 'Mobile Legends',
            'category' => 'MOBA',
            'icon' => '🎮',
            'color' => '#5B61D6',
            'description' => 'Mobile Legends: Bang Bang',
        ],

        'free-fire' => [
            'name' => 'Free Fire',
            'category' => 'Battle Royale',
            'icon' => '🔥',
            'color' => '#F97316',
            'description' => 'Garena Free Fire',
        ],

        'pubg-mobile' => [
            'name' => 'PUBG Mobile',
            'category' => 'Battle Royale',
            'icon' => '🎯',
            'color' => '#D4A017',
            'description' => 'PUBG Mobile',
        ],

        'honor-of-kings' => [
            'name' => 'Honor of Kings',
            'category' => 'MOBA',
            'icon' => '👑',
            'color' => '#2563EB',
            'description' => 'Honor of Kings',
        ],

        'genshin-impact' => [
            'name' => 'Genshin Impact',
            'category' => 'RPG',
            'icon' => '✨',
            'color' => '#0EA5E9',
            'description' => 'Genshin Impact',
        ],

        'valorant' => [
            'name' => 'Valorant',
            'category' => 'FPS',
            'icon' => '⚡',
            'color' => '#E11D48',
            'description' => 'Valorant',
        ],
    ];

    abort_unless(isset($games[$game]), 404);

    return view('topup.show', [
        'game' => $games[$game],
        'gameSlug' => $game,
    ]);
}
}