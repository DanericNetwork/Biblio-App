<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Models\Item;
use Inertia\Inertia;

class AdminController extends Controller
{
  public function index()
  {
    return Inertia::render('admin/index', [
      'userData' => [
        'name' => 'John Doe',
      ],
      'count' => [
        'items' => 10,
        'customers' => 20,
        'reservations' => 30,
        'invoices' => 40,
      ],
      'chart1' => [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        'series' => [1, 2, 3, 4, 5, 6, 7, 8]
      ],
      'chart2' => [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        'series' => [0, 1, 2, 3, 4, 5, 6, 7]
      ],
    ]);
  }

  public function items() {

    $items = Item::where('modified_kind', '!=', ModifiedEnum::deleted)->paginate(10)->through(function ($item) {
      return [
        'id' => $item->id,
        'name' => $item->name,
        'description' => $item->description,
        'author' => $item->author->name,
        'category' => $item->category->category,
        'age_rating' => $item->ageRating->rating,
        'ISBN' => $item->ISBN,
        'modified_kind' => $item->modified_kind,
        'modified_user' => $item->modified_user,
        'modified_at' => $item->modified_at,
      ];
    });

    return Inertia::render('admin/items/index', [
      'items' => $items,
    ]);
  }
}
