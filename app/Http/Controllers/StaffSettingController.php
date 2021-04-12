<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\StaffSetting;

class StaffSettingController extends Controller
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
     * Get staff setting by staff id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStaffSettingByStaffId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', [$request->staff_id]);
            $staffSetting= StaffSetting::where('staff_id', '=', (int)$request->staff_id)
                ->first();

            if (!empty($staffSetting)) {
                Log::info(__METHOD__ .' END', ['Get data success']);
                return response()->json(array(
                    'data' => $staffSetting, 
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
