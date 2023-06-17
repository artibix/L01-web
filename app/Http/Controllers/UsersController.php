<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:50',
            ],
            'password' => 'nullable|confirmed|min:6',
        ]);

        $data = [];
        $data['name'] = $request->name;

        if (Hash::check($request->password, $user->password)) {
            session()->flash('danger', '请勿使用旧密码');
            return redirect()->back();
        }

        if ($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success', '更新用户信息成功！');

        return redirect()->route('users.show', $user);
    }
}
