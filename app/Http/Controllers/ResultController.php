<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Enums\TestType;
use App\Enums\State;

class ResultController extends Controller
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
     * Get Test Result
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTestResult(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['staff_id: '.$request->staff_id, 'theme_id: '.$request->theme_id]);
            $result = Result::selectRaw('theme_id, MAX(score) AS score, MAX(exam_date) AS exam_date')
                ->where('staff_id', '=', (int)$request->staff_id)
                ->where('theme_id', '=', (int)$request->theme_id)
                ->where('kubun', '=', TestType::TEST)
                ->where('state', '=', State::PASSED)
                ->groupBy('theme_id')
                ->orderBy('theme_id', 'asc')
                ->orderBy('score', 'desc')
                ->orderBy('exam_date', 'desc')
                ->get();
            if (!$result->isEmpty()) {
                Log::info(__METHOD__ .' END', ['テスト結果データがあります。']);
                return response()->json(array(
                    'data' => $result,
                    'success' => true,
                    'error' => null,
                ), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }

            Log::info(__METHOD__ .' END', ['テスト結果データがありません。']);
            return response()->json(array(
                'data' => null,
                'success' => true,
                'error' => [
                    'message' => null,
                    'code' => '0017',
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
     * Get Exam Result
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getExamResult(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['staff_id: '.$request->staff_id, 'category_id: '.$request->category_id]);
            $result = Result::selectRaw('grade, MAX(score) AS score, MAX(exam_date) AS exam_date')
                ->where('staff_id', '=', (int)$request->staff_id)
                ->where('category_id', '=', (int)$request->category_id)
                ->where('kubun', '=', TestType::EXAM)
                ->where('state', '=', State::PASSED)
                ->groupBy('grade')
                ->orderBy('grade', 'asc')
                ->orderBy('score', 'desc')
                ->orderBy('exam_date', 'desc')
                ->get();
            if (!$result->isEmpty()) {
                Log::info(__METHOD__ .' END', ['テスト結果データがあります。']);
                return response()->json(array(
                    'data' => $result,
                    'success' => true,
                    'error' => null,
                ), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }

            Log::info(__METHOD__ .' END', ['テスト結果データがありません。']);
            return response()->json(array(
                'data' => null,
                'success' => true,
                'error' => [
                    'message' => null,
                    'code' => '0018',
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
     * Save Test Result
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveTestResult(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['テスト結果を登録します。']);
            $result = new Result;
            $result->staff_id = $request->staff_id;
            $result->kubun = TestType::TEST;
            $result->theme_id = $request->theme_id;
            $result->score = $request->score;
            $result->state = $request->state;
            $result->exam_date = $request->exam_date;

            if($result->save()) {
                Log::info(__METHOD__ .' END', ['テスト結果の登録に成功しました。']);
                return response()->json(array(
                    'data' => null,
                    'success' => true,
                    'error' => null,
                ));
            }

            Log::info(__METHOD__ .' END', ['テスト結果の登録に失敗しました。']);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0013',
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
     * Save Exam Result
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveExamResult(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['試験結果を登録します。']);
            $result = new Result;
            $result->staff_id = $request->staff_id;
            $result->kubun = TestType::EXAM;
            $result->category_id = $request->category_id;
            $result->grade = $request->grade;
            $result->score = $request->score;
            $result->state = $request->state;
            $result->exam_date = $request->exam_date;

            if($result->save()) {
                Log::info(__METHOD__ .' END', ['試験結果の登録に成功しました。']);
                return response()->json(array(
                    'data' => null,
                    'success' => true,
                    'error' => null,
                ));
            }

            Log::info(__METHOD__ .' END', ['試験結果の登録に失敗しました。']);
            return response()->json(array(
                'data' => null,
                'success' => false,
                'error' => [
                    'message' => null,
                    'code' => '0024',
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
     * Get staff rank
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRank(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['staff_id: '.$request->staff_id]);
            $result = Result::selectRaw('`staff_id`, `theme_id`, `category_id`, `grade`, `state`, MAX(`score`) AS score, MAX(`exam_date`) AS exam_date, IF(ISNULL(`theme_id`), CASE WHEN `grade` = 3 THEN 10 WHEN `grade` = 2 THEN 15 ELSE 25 END, 3) AS `basic_score`')
                ->where('staff_id', '=', $request->staff_id)
                ->where('state', '=', State::PASSED)
                ->groupByRaw('`staff_id`, `theme_id`, `category_id`, `grade`')
                ->orderBy('staff_id', 'ASC')
                ->orderBy('theme_id', 'ASC')
                ->orderBy('category_id', 'ASC')
                ->orderBy('grade', 'ASC')
                ->orderBy('score', 'DESC')
                ->orderBy('exam_date', 'DESC')
                ->get();
            if (!$result->isEmpty()) {
                Log::info(__METHOD__ .' END', ['テスト結果データがあります。']);
                return response()->json(array(
                    'data' => $result,
                    'success' => true,
                    'error' => null,
                ), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }

            Log::info(__METHOD__ .' END', ['テスト結果データがありません。']);
            return response()->json(array(
                'data' => null,
                'success' => true,
                'error' => [
                    'message' => null,
                    'code' => '0018',
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
