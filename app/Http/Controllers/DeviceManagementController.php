<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\DeviceManagement;
use App\Repositories\Contracts\DeviceManagementRepositoryInterface;
use App\Enums\Message;

class DeviceManagementController extends Controller
{
    // space that we can use the repository from
    private $deviceManagementRepository;

    public function __construct(DeviceManagementRepositoryInterface $deviceManagementRepository)
    {
        // set the model
        $this->deviceManagementRepository = $deviceManagementRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function saveDeviceManagement(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['端末管理を登録します。']);
            $device = new DeviceManagement;
            $device->user_id = $request->user_id;
            $device->device_no = $request->device_no;
            $device->login_date = $request->login_date;
            $device->staff_id = $request->staff_id;
            $result = $this->deviceManagementRepository->saveDevice([$device]);
            if($result <> 0) {
                Log::info(__METHOD__ .' END', [Message::INF0023['msg']]);
                return $this->httpNoContent();
            }
            Log::info(__METHOD__ .' END', [Message::ERR0023['msg']]);
            return $this->httpNotData(Message::ERR0023['code']);
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
