<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Auth\Events\Verified; 


class VerificationController extends Controller
{
    public function notice()
    {
        return view('auth.verify'); 
    }

    public function verify(Request $request)
    {
        $user = User::findOrFail($request->route('id'));

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            abort(403, 'Liên kết xác minh không hợp lệ.');
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        return redirect()->route('login')->with('success', 'Xác minh thành công! Vui lòng đăng nhập.');
    }



    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/home/index');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Đã gửi lại email xác minh!');
    }
}
