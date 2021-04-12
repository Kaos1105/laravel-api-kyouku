<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transformers\TermTransformer;
use App\Repositories\Contracts\TermRepositoryInterface;
use App\Enums\Message;

class TermController extends Controller
{
    // space that we can use the repository from
    private $termRepository;

    public function __construct(TermRepositoryInterface $termRepository)
    {
        // set the model
        $this->termRepository = $termRepository;
    }

    /**
     * Get term by theme id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTermByThemeId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', [$request->theme_id]);
            $terms = $this->termRepository->getAllByThemeId((int)$request->theme_id);
            if (!$terms->isEmpty()) {
                Log::info(__METHOD__ .' END', [Message::INF0010['msg']]);
                return $this->httpOK($terms, new TermTransformer);
            }
            Log::info(__METHOD__ .' END', [Message::ERR0010['msg']]);
            return $this->httpNotData(Message::ERR0010['code']);
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
