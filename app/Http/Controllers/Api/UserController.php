<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate();

        $usersList = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
            ];
        });

        return response()->json([
            'users' => $usersList,
            'current_page' => $users->currentPage(),
            'total' => $users->total(),
            'last_page' => $users->lastPage(),
        ], 200);
    }

    public function companies(User $user)
    {
      $companies = $user->companies->pluck('name', 'id');

      return response()->json([
          'companies' => $companies
      ], 200);
    }
}
