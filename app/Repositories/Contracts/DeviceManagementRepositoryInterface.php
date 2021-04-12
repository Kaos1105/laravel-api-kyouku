<?php

namespace App\Repositories\Contracts;

interface DeviceManagementRepositoryInterface extends BaseRepositoryInterface
{
    public function saveDevice(array $devices);
}
