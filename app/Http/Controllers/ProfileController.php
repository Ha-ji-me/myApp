<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('profile.index',compact('users'));

    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('profile.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update',$user);


        //バリデーション
        $inputs = request()->validate([
            'name' => 'required|max:255',
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'avatar'=>'image|max:1024',
            'password'=>'required|confirmed|max:255|min:8',
            'password_confirmation'=>'required|same:password'
        ]);

        //データベースに保存
        $inputs['password'] = Hash::make($inputs['password']);

        //アバター保存
        if(request('avatar'))
        {
            $name = request()->file('avatar')->getClientOriginalName();
            $avatar = date('Ymd_His').'_'.$name;
            request()->file('avatar')->storeAs('public/avatar',$avatar);
            $inputs['avatar'] = $avatar;
        }

        $user->update($inputs);
        return back()->with('message','情報を更新しました');
    }

}
