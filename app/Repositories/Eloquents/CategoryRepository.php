<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getAllByGroupId($group_id)
    {
        return $this->model->leftjoin('group_category', 'group_category.category_id', '=', 'category.id')
                ->where('group_category.group_id', '=', $group_id)
                ->use()
                ->get();
    }
}
