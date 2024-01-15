<?php

namespace Database\Seeders;

use App\Models\ItemAgeRating;
use App\Models\ItemCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = [
          "All ages",
          "1-3",
          "4-8",
          "8-12",
          "12-14",
          "14-16",
          "16-18",
          "18+",
        ];

        // RATINGS
        foreach ($ratings as $rating) {
            ItemAgeRating::create([
                'rating' => $rating,
                'modified_user' => User::where('email', 'superadmin@biblio.nl')->first()->id,
                'modified_kind' => 'I',
            ]);
        }

        // CATEGORIES
        $categories = [
            "Action",
            "Adventure",
            "Animation",
            "Biography",
            "Comedy",
            "Crime",
            "Documentary",
            "Drama",
            "Family",
            "Fantasy",
            "Film-Noir",
            "History",
            "Horror",
            "Music",
            "Musical",
            "Mystery",
            "Romance",
            "Sci-Fi",
            "Sport",
            "Thriller",
            "War",
            "Western",
        ];

        foreach ($categories as $category) {
            ItemCategory::create([
                'category' => $category,
                'modified_user' => User::where('email', 'superadmin@biblio.nl')->first()->id,
                'modified_kind' => 'I'
            ]);
        }
    }
}
