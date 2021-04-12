<?php

namespace App\Repositories\Contracts;

interface StaffSettingRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
