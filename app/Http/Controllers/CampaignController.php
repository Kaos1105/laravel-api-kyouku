<?php

namespace App\Http\Controllers;

use App\Mail\SendToken;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkPassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'security_code' => 'required|min:8|max:8|regex:/^(?=.*[0-9])(?=.*[A-Z])([A-Z0-9]+)$/',
        ]);

        if ($validator->fails()) {
            return redirect()->route('welcome')->with([
                'status'  => 0,
                'message' => '入力内容に誤りがあります。再度ご確認ください。',
            ]);
        }

        $users = Users::query()->where($request->except('_token'))->get();

        if (count($users) < 1) {
            return redirect()->route('welcome')->with([
                'status'  => 0,
                'message' => '入力内容に誤りがあります。再度ご確認ください。',
            ]);
        }

        foreach ($users as $user) {

            $token = '';
            for ($i = 0; $i < 4; $i++) {
                $token .= mt_rand(0, 9);
            }

            $user->update(['token_key' => strtoupper($token)]);
            Mail::to($user->email)->send(new SendToken($user));
        }

        return redirect()->route('verify-token')->with([
            'token_key'     => $user->token_key,
            'security_code' => $request->security_code,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkToken(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'token_key'     => 'required|regex:/^[A-Z-0-9\-\s]+$/',
            'security_code' => 'required|min:8|max:8|regex:/^(?=.*[0-9])(?=.*[A-Z])([A-Z0-9]+)$/',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('check-token')
                ->with([
                    'token_key'     => optional($request->token_key),
                    'security_code' => $request->security_code,
                    'status'        => 0,
                    'message'       => 'セキュリティコードが正しくありません。',
                ]);
        }

        $user = Users::query()
                    ->where('token_key', $request->token_key)
                    ->where('security_code', $request->security_code)
                    ->first();

        if (! $user) {
            return redirect()
                ->route('check-token')
                ->with([
                    'token_key'     => $request->token_key,
                    'security_code' => $request->security_code,
                    'status'        => 0,
                    'message'       => 'セキュリティコードが正しくありません。',
                ]);
        }

        return redirect()->route('show-video', ['token' => $user->token_key])
                         ->with(['token_key' => $user->token_key]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showVideo(Request $request)
    {
        if (! \Illuminate\Support\Facades\Session::has('token_key')) {
            return redirect()->route('welcome');
        }

        $user = Users::query()->where(['token_key' => $request->token])->first();

        if (! $user) {
            return redirect()->route('welcome');
        }

        $user->update(['token_key' => null]);

        if ($user->video_type === 'A') {
            return view('videoA');
        } else {
            return view('videoB');
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPopupVideo(Request $request)
    {
        $data['code'] = $request->code;

        return view('video-detail', $data);
    }
}
