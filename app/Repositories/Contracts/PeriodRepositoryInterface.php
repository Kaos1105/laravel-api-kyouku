<?php

namespace App\Repositories\Contracts;

interface PeriodRepositoryInterface extends BaseRepositoryInterface
{
    public function activation($activation_code);
}
