<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Period;
use App\Enums\UseFlg;

class PeriodController extends Controller
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
     * @return json data
     */
    public function checkPeriodByUserId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['user_id: '.$request->user_id]);
            $period = Period::where('user_id', '=', (int)$request->user_id)
                ->whereDate('start_date', '<=', Carbon::now())
                ->whereDate('end_date', '>=', Carbon::now())
                ->where('use_flg', '=', UseFlg::USING)
                ->first();

            if (!empty($period)) {
                Log::info(__METHOD__ .' END', ['利用期間があります。']);
                return response()->json(array(
                    'data' => null, 
                    'success' => true,
                    'error' => null,
                ));
            }

            Log::info(__METHOD__ .' END', ['利用期間が終了しました。']);
            return response()->json(array(
                'data' => null, 
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0006',
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
