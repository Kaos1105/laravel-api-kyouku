<?php

namespace App\Repositories\Contracts;

interface SystemManagementRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
