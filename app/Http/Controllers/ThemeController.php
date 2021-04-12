<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Theme;
use App\Enums\UseFlg;

class ThemeController extends Controller
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
     * Get theme by category id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getThemeByCategoryId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', [$request->category_id]);
            $theme= Theme::where('category_id', '=', (int)$request->category_id)
                ->where('use_flg', '=', UseFlg::USING)
                ->get();

            if (!$theme->isEmpty()) {
                Log::info(__METHOD__ .' END', ['テーマデータがあります。']);
                return response()->json(array(
                    'data' => $theme, 
                    'success' => true,
                    'error' => null,
                ), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }

            Log::info(__METHOD__ .' END', ['テーマデータがありません。']);
            return response()->json(array(
                'data' => null, 
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0008',
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
