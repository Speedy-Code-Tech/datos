<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function admin_account()
    {
        $authUser = Auth::user();
        $user = User::where('employee_id', $authUser->employee_id)->first();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        return view('office_staff.admin_account', compact('user'));
    }


    public function os_account()
    {
        $authUser = Auth::user();
        $user = User::where('employee_id', $authUser->employee_id)->first();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        return view('office_staff.os_account', compact('user'));
    }

    public function dean_account()
    {
        $authUser = Auth::user();
        $user = User::where('employee_id', $authUser->employee_id)->first();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        return view('office_staff.dean_account', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'gender' => 'required|string|max:255',
            'phone_number' => 'required|string|max:11',
            'home_address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->phone_number = $request->input('phone_number');
        $user->home_address = $request->input('home_address');
        $user->email = $request->input('email');
        $user->username = $request->input('username');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save(); // This will automatically update the `updated_at` column

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }
}


