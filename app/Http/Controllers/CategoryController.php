<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Transformers\CategoryTransformer;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Enums\Message;

class CategoryController extends Controller
{
    // space that we can use the repository from
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        // set the model
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return json data
     */
    public function getCategoryByGroupId(Request $request)
    {
        try {
            Log::info(__METHOD__ .' START', [$request->group_id]);
            $category = $this->categoryRepository->getAllByGroupId((int)$request->group_id);
            if (!$category->isEmpty()) {
                Log::info(__METHOD__ .' END', [Message::INF0007['msg']]);
                return $this->httpOK($category, CategoryTransformer::class);
            }
            Log::info(__METHOD__ .' END', [Message::ERR0007['msg']]);
            return $this->httpNotData(Message::ERR0007['code']);
        } catch (\Exception $e) {
            Log::error(__METHOD__ .' ERROR', [$e->getMessage()]);
            return $this->httpHaveException(Message::SYS9999, $e->getMessage());
        }
    }
}
