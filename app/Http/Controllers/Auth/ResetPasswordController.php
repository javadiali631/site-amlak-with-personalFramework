<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ResetPasswordRequest;
use App\User;

class ResetPasswordController{

    private $redirectTo = '/login';

    public function view($token)
    {
        $user = User::where('remember_token', $token)->where('remember_token_expire', '>=', date('Y-m-d H:i:s'))->get();
        if(empty($user))
        {
            die('لینک بازیابی اعتبار ندارد');
        }
        $user = $user[0];
        return view('auth.reset-password', compact('token'));
    }
    
    public function resetPassword($token)
    {
        $request = new ResetPasswordRequest();
        $inputs = $request->all();
        $user = User::where('remember_token', $token)->where('remember_token_expire', '>=', date('Y-m-d H:i:s'))->get();
        if(empty($user))
        {
            error('reset-password', 'کاربر وجود ندارد');
            return back();
        }
        if($inputs['password'] !== $inputs['new_password'])
        {
            error('reset-password', 'مطابقت ندارد ');
            return back();
        }
        $user = $user[0];
        $user->password = password_hash($inputs['password'], PASSWORD_DEFAULT);
        $user->save();
        return redirect($this->redirectTo);
    }
}