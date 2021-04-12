<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Models\Notification;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    public function __construct(Notification $model)
    {
        parent::__construct($model);
    }

    public function getAllByUserId($user_id)
    {
        return $this->model->where('user_id', '=', $user_id)
            ->display()
            ->use()
            ->get();
    }
}
