<?php

namespace App\Repositories\Contracts;

interface NotificationRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllByUserId($user_id);
}
