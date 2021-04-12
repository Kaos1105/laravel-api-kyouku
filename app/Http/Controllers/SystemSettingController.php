<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Enums\UseFlg;

class SystemSettingController extends Controller
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
     * Get system setting by user id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSystemSettingByUserId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', [$request->user_id]);
            $systemSetting= SystemSetting::where('user_id', '=', (int)$request->user_id)
                ->where('use_flg', '=', UseFlg::USING)
                ->get();

            if (!$systemSetting->isEmpty()) {
                Log::info(__METHOD__ .' END', ['Get data success']);
                return response()->json(array(
                    'data' => $systemSetting, 
                    'success' => true,
                    'error' => null,
                ), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }

            Log::info(__METHOD__ .' END', ['Get not data success']);
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
}
