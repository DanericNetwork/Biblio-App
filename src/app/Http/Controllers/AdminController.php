<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
  public function index()
  {
    // Get the Statistics
    $items = Item::count();
    $customers = User::count();
    $reservations = Reservation::count();
    $invoices = Fine::count();

    return Inertia::render('admin/index', [
      'count' => [
        'items' => $items,
        'customers' => $customers,
        'reservations' => $reservations,
        'invoices' => $invoices,
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
}
