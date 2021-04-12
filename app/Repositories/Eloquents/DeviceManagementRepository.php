<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\DeviceManagementRepositoryInterface;
use App\Models\DeviceManagement;

class DeviceManagementRepository extends BaseRepository implements DeviceManagementRepositoryInterface
{
    public function __construct(DeviceManagement $model)
    {
        parent::__construct($model);
    }

    public function saveDevice($devices)
    {
        return $this->model->save($devices);
    }
}
