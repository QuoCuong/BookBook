<?php

namespace Book\Http\Controllers\Auth;

use Book\Http\Controllers\Controller;
use Book\Mail\ForgotPasswordMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email'    => 'Địa chỉ email của bạn không hợp lệ',
            'email.exists'   => 'Địa chỉ email không tồn tại',
        ]);

        $token = str_random(60);

        $record = DB::table('password_resets')->where('email', $request->email)->first();

        if ($record) {
            // $record->destroy();
            DB::table('password_resets')->where('email', $request->email)->delete();
        } else {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
            ]);
        }

        Mail::to($request->email)->send(new ForgotPasswordMail($token));

        return view('message', [
            'title'   => 'Đã gửi!',
            'message' => 'Hãy kiểm tra email của bạn để đặt lại mật khẩu',
            'url'     => null,
        ]);

    }
}
