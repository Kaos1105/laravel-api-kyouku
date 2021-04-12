<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transformers\GroupTransformer;
use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Enums\Message;

class GroupController extends Controller
{
    // space that we can use the repository from
    private $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        // set the model
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function getGroupByUserId(Request $request)
    {
        try {
            Log::info(__METHOD__ . ' START', ['user_id: ' . $request->user_id]);
            $groups = $this->groupRepository->getAllByUserId((int)$request->user_id);
            if (!$groups->isEmpty()) {
                Log::info(__METHOD__ . ' END', [Message::INF0003['msg']]);
                return $this->httpOK($groups, GroupTransformer::class);
            }
            Log::info(__METHOD__ . ' END', [Message::ERR0003['msg']]);
            return $this->httpNotData(Message::ERR0003['code']);
        } catch (\Exception $e) {
            Log::error(__METHOD__ . ' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
