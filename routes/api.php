<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/activation', 'UserController@activation');
    Route::post('/groups', 'GroupController@getGroupByUserId');
    Route::post('/staffs', 'StaffController@getStaffByGroupId');
    Route::get('/system_messages', 'SystemMessageController@getSystemMessage');
    Route::post('/notifications', 'NotificationController@getNotificationByUserId');
    Route::post('/period', 'PeriodController@checkPeriodByUserId');
    Route::post('/check_register', 'StaffController@checkRegister');
    Route::post('/register', 'StaffController@registerPassword');
    Route::post('/reset', 'StaffController@resetPassword');
    Route::post('/login', 'StaffController@login');
    Route::post('/categories', 'CategoryController@getCategoryByGroupId');
    Route::post('/themes', 'ThemeController@getThemeByCategoryId');
    Route::post('/terms', 'TermController@getTermByThemeId');
    Route::post('/test_questions', 'TermController@getTestQuestion');
    Route::post('/save_test_result', 'ResultController@saveTestResult');
    Route::post('/exam_results', 'ResultController@getExamResult');
    Route::post('/test_results', 'ResultController@getTestResult');
    Route::post('/exam_questions', 'TermController@getExamQuestion');
    Route::post('/save_exam_result', 'ResultController@saveExamResult');
    Route::post('/ranks', 'ResultController@getRank');
    Route::get('/system_management', 'SystemManagementController@getSystemManagement');
    Route::post('/system_setting', 'SystemSettingController@getSystemSettingByUserId');
    Route::post('/save_device_management', 'DeviceManagementController@saveDeviceManagement');
    Route::post('/staff_setting', 'StaffSettingController@getStaffSettingByStaffId');
});