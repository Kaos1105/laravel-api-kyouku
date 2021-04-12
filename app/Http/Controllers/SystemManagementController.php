<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\SystemManagement;
use App\Enums\UseFlg;

class SystemManagementController extends Controller
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
     * Get system management
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSystemManagement(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START');
            $systemManagement = SystemManagement::where('use_flg', '=', UseFlg::USING)
                ->first();

            if (!empty($systemManagement)) {
                Log::info(__METHOD__ .' END', ['Get data success']);
                return response()->json(array(
                    'data' => $systemManagement,
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
                    'code' => '0007',
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
