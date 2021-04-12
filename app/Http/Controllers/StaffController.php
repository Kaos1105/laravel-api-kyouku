<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Staff;
use App\Enums\UseFlg;

class StaffController extends Controller
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
     * Get staff by group id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStaffByGroupId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['group_id: '.$request->group_id]);
            $staff = Staff::where('group_id', '=', (int)$request->group_id)
                ->where('use_flg', '=', UseFlg::USING)
                ->get();

            if (!$staff->isEmpty()) {
                Log::info(__METHOD__ .' END', ['利用者情報があります。']);
                return response()->json(array(
                    'data' => $staff,
                    'success' => true,
                    'error' => null,
                ), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }

            Log::info(__METHOD__ .' END', ['利用者情報がありません。']);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0004',
                ],
            ));
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => '9999',
                ],
            ));
        }
    }

    /**
     * Login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            Log::info(__METHOD__.' START', ['group_id: '.$request->group_id, 'staff_id: '.$request->staff_id]);
            $staff = Staff::where('group_id', '=', (int)$request->group_id)
                ->where('id', '=', (int)$request->staff_id)
                ->where('use_flg', '=', UseFlg::USING)
                ->first();

            if (!empty($staff)) {
                if($request->password === $staff->password) {
                    $token = Str::random(10);

                    Log::info(__METHOD__.' END', ['ログインが成功します。']);
                    return response()->json(array(
                        'data' => hash('sha256', $token),
                        'success' => true,
                        'error' => null,
                    ));
                }

                Log::info(__METHOD__ .' END', ['入力したパスワードが間違っています。']);
                return response()->json(array(
                    'data' => null,
                    'success' => false,
                    'error' => [
                        'message' => null,
                        'code' => '0005',
                    ],
                ));
            }

            Log::info(__METHOD__ .' END', ['ユーザーが存在しません。']);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0005',
                ],
            ));
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => '9999',
                ],
            ));
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function registerPassword(Request $request)
    {
        try {
            Log::info(__METHOD__.' START', ['group_id: '.$request->group_id, 'staff_id: '.$request->staff_id]);
            $staff = Staff::where('group_id', '=', (int)$request->group_id)
                ->where('id', '=', (int)$request->staff_id)
                ->where('use_flg', '=', UseFlg::USING)
                ->first();

            if (!empty($staff)) {
                $staff->password = $request->password;

                if($staff->save()) {
                    Log::info(__METHOD__ .' END', ['パスワードの登録が成功しました。']);
                    return response()->json(array(
                        'data' => null,
                        'success' => true,
                        'error' => null,
                    ));
                }
            }

            Log::info(__METHOD__ .' END', ['ユーザーが存在しません。']);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0005',
                ],
            ));
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => '9999',
                ],
            ));
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function resetPassword(Request $request)
    {
        try {
            Log::info(__METHOD__.' START', ['group_id: '.$request->group_id, 'staff_id: '.$request->staff_id]);
            $staff = Staff::where('group_id', '=', (int)$request->group_id)
                ->where('id', '=', (int)$request->staff_id)
                ->where('use_flg', '=', UseFlg::USING)
                ->first();

            if (!empty($staff)) {
                if($request->password === $staff->password) {
                    Log::info(__METHOD__.' END', ['パスワードのリセットが成功します。']);
                    return response()->json(array(
                        'data' => null,
                        'success' => true,
                        'error' => null,
                    ));
                }

                Log::info(__METHOD__ .' END', ['入力したパスワードが間違っています。']);
                return response()->json(array(
                    'data' => null,
                    'success' => false,
                    'error' => [
                        'message' => null,
                        'code' => '0005',
                    ],
                ));
            }

            Log::info(__METHOD__ .' END', ['ユーザーが存在しません。']);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0005',
                ],
            ));
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => $e->getMessage(),
                    'code' => '9999',
                ],
            ));
        }
    }
}
