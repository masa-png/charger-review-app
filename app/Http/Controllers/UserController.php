<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Type;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Wattage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        $reviews = Review::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(2);

        return view('users.mypage', compact('user', 'reviews'));
    }

    public function create_review()
    {
        $vendors = Vendor::all();
        $wattages = Wattage::all();
        $types = Type::all();
        $user = Auth::user();

        return view('users.create_review', compact('user', 'vendors', 'wattages', 'types'));
    }

    public function edit_review(Request $request)
    {
        $review = Review::find($request->review);

        $vendors = Vendor::all();
        $wattages = Wattage::all();
        $types = Type::all();
        $user = Auth::user();

        return view('users.edit_review', compact('review', 'vendors', 'wattages', 'types', 'user'));
    }

    public function update_image(Request $request)
    {
        $user = Auth::user();

        if ($request->file('profile_image') !== null) {

            $request->validate([
                'profile_image' => 'file|image|mimes:png,jpg,jpeg',
            ]);
            // s3に保存
            $path = Storage::disk('s3')->putFile('profiles', $request->file('profile_image'));

            $user->image_path = Storage::disk('s3')->url($path);
            $user->save();

            return back()->with('flash_message', 'プロフィール画像を設定しました。');
        } else {
            return back();
        }
    }

    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->update();

        return to_route('mypage')->with('flash_message', 'ユーザー情報を更新しました。');
    }

    public function edit_password()
    {
        return view('users.edit_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::user();
        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return to_route('mypage.edit_password');
        }

        return to_route('mypage')->with('flash_message', 'パスワードを変更しました。');
    }

    public function destroy(Request $request)
    {
        Auth::user()->delete();
        return redirect('/reviews')->with('flash_message', '退会が完了しました。');
    }
}
