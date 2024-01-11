<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Traits\Imports\OpenLibraryTrait;

class IndexController extends Controller
{
    use OpenLibraryTrait;
    public function index() {
        $this->importOpenLibrary();
        return Inertia::render('index');
    }
}
