<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TermRepositoryInterface;
use App\Models\Term;

class TermRepository extends BaseRepository implements TermRepositoryInterface
{
    public function __construct(Term $model)
    {
        parent::__construct($model);
    }

    public function getAllByThemeId($id)
    {
        return $this->model->where('theme_id', '=', $id)
            ->use()
            ->get();
    }
}