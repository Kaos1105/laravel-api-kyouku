<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transformers\NotificationTransformer;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Enums\Message;

class NotificationController extends Controller
{
    // space that we can use the repository from
    private $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        // set the model
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function getNotificationByUserId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', ['user_id: '.$request->user_id]);
            $notifications = $this->notificationRepository->getAllByUserId((int)$request->user_id);
            if (!$notifications->isEmpty()) {
                Log::info(__METHOD__ .' END', [Message::INF0025['msg']]);
                return $this->httpOK($notifications, NotificationTransformer::class);
            }
            Log::info(__METHOD__ .' END', [Message::ERR0025['msg']]);
            return $this->httpOK();
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
