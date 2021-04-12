<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transformers\SystemMessageTransformer;
use App\Repositories\Contracts\SystemMessageRepositoryInterface;
use App\Enums\Message;

class SystemMessageController extends Controller
{
    // space that we can use the repository from
    private $systemMessageRepository;

    public function __construct(SystemMessageRepositoryInterface $systemMessageRepository)
    {
        // set the model
        $this->systemMessageRepository = $systemMessageRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function getSystemMessage(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START');
            $systemMessages = $this->systemMessageRepository->getAllMessage();
            if (!$systemMessages->isEmpty()) {
                Log::info(__METHOD__ .' END', [Message::INF0026['msg']]);
                return $this->httpOK($systemMessages, SystemMessageTransformer::class);
            }
            Log::info(__METHOD__ .' END', [Message::ERR0026['msg']]);
            return $this->httpOK();
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
