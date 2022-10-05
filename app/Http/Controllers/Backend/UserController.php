<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CompanyDetachRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', "DESC")->paginate();

        return view('backend.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('backend.user.show', compact('user'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => now(),
        ]);

        return redirect()->route('dashboard.user.index');
    }

    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('dashboard.user.show', $user->id);
    }

    public function delete(User $user)
    {
        $user->companies()->detach();
        $user->delete();

        return response()->json(['success' => true, 'message' => 'User deleted successfully'], 200);
    }

    public function companyDetach(User $user, CompanyDetachRequest $request)
    {
        $data = $request->validated(); Log::info($data);
        $user->companies()->detach($data['id']);

        return response()->json(['success' => true, 'message' => 'Company detach successfully'], 200);
    }
}
