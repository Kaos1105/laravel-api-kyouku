<?php

namespace App\Repositories\Contracts;

interface StaffRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
