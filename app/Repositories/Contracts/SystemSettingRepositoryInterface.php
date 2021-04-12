<?php

namespace App\Repositories\Contracts;

interface SystemSettingRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
