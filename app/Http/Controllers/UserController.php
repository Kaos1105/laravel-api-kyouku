<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transformers\UserTransformer;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Enums\Message;

class UserController extends Controller
{
    // space that we can use the repository from
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        // set the model
        $this->userRepository = $userRepository;
    }

    /**
     * Active user in device
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activation(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START');
            $user = $this->userRepository->activation((string)$request->activation_code);
            if (!empty($user)) {
                if($user->start_date <= Carbon::now() && $user->end_date >= Carbon::now()) {
                    Log::info(__METHOD__ .' END', [Message::INF0001['msg']]);
                    return $this->httpOK($user, UserTransformer::class);
                }
                Log::info(__METHOD__ .' END', [Message::ERR0002['msg']]);
                return $this->httpNotData(Message::ERR0002['code']);
            }
            Log::info(__METHOD__ .' END', [Message::ERR0001['msg']]);
            return $this->httpNotData(Message::ERR0001['code']);
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
