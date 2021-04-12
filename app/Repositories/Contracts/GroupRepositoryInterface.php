<?php

namespace App\Repositories\Contracts;

interface GroupRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllByUserId($user_id);
}
