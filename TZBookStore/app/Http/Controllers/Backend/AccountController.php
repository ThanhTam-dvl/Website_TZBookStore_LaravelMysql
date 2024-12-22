<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.accounts.manage-account', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'full_name' => 'required',
            'password' => 'required|min:6',
            'phone' => 'nullable',
            'role' => 'required',
            'is_active' => 'required|boolean'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->back()->with('success', 'Tài khoản đã được tạo thành công.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|unique:users,username,'.$id.',user_id',
            'email' => 'required|email|unique:users,email,'.$id.',user_id',
            'full_name' => 'required',
            'phone' => 'nullable',
            'role' => 'required',
            'is_active' => 'required|boolean'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return redirect()->back()->with('success', 'Tài khoản đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
    }
} 