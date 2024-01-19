<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\ResponseStatus;
use App\Http\Requests\SearchUsersRequest;
use App\Models\User;
use App\Traits\CommonTrait;
use Inertia\Inertia;

class UserController extends Controller
{
  use CommonTrait;
  
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // render page
  }

   /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // render page
  }
  
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // 
  }
  
  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    // render page
  }
  
  /**
   * Update the specified resource in storage.
   */
  public function update()
  {
    // 
  }
  
  /**
   * Remove the specified resource from storage.
   */
  public function destroy()
  {
    // 
  }

  /**
   * Search users
   */
  public function search(SearchUsersRequest $request) {
    $validated = $request->validated();
    $search = $validated['search'];
    
    $users = User::where('last_name', 'like', "%{$search}%")
      ->orWhere('first_name', 'like', "%{$search}%")
      ->orWhere('email', 'like', "%{$search}%")
      ->orWhere('id', 'like', "%{$search}%")
      ->orWhereHas('libraryPasses', function($query) use ($search) {
        $query->where('barcode', 'like', "%{$search}%");
      })
      ->get(); 

    return $this->CommonResponse(
      ResponseStatus::success,
      'Search results',
      $users
    );
  }
}
