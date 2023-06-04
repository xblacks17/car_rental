<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {

        return Inertia::render('Admin/Users', [
            'users' => User::all()
        ]);
    }
    public function profile()
    {

        return Inertia::render('User/Profile');
    }
    public function rentals()
    {

        $rentals =  Rental::where('user_id', auth()->user()->id)->get();
     

        return Inertia::render('User/Rentals', [
            'rentals' => $rentals,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'password' => 'required',
            'user_type' => 'required',
            'phone_number' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back();
    }

    public function edit(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'user_type' => 'required',
            'phone_number' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'phone_number' => $request->phone_number,

        ]);

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
