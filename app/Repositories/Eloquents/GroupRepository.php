<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\GroupRepositoryInterface;
use App\Models\Group;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{
    public function __construct(Group $model)
    {
        parent::__construct($model);
    }

    public function getAllByUserId($user_id)
    {
        return $this->model->where('user_id', '=', $user_id)
            ->use()
            ->get();
    }
}