<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
